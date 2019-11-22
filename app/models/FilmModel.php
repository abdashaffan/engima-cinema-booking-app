<?php

define('RECORD_PER_PAGE', 5);

class FilmModel
{
    // Query to get data from TMDB
    public function getAllTMDB()
    {
        $time_now = date('Y-m-d');
        
        $time_seven_day_ago = date('Y-m-d', strtotime('-7 days'));

        $curl = curl_init();

        $query = "https://api.themoviedb.org/3/discover/movie?api_key=342cd394f089d67c3e28dfc6e965a8b5&language=en-US&";
        $query .= "language=en-US&primary_release_date.gte=";
        $query .= $time_seven_day_ago;
        $query .= "&primary_release_date.lte=";
        $query .=  $time_now;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $hasil = json_decode($response, true);
            // var_dump($hasil);
            return $hasil;
        }
    }

    public function getFilmByIdTMDB($id)
    {
        $curl = curl_init();

        $query = "https://api.themoviedb.org/3/movie/";
        $query .= $id;
        $query .= "?api_key=342cd394f089d67c3e28dfc6e965a8b5&language=en-US";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $hasil = json_decode($response, true);
            return $hasil;
        }
    }

    public function getResultTMDB($keyword)
    {
        $curl = curl_init();

        $query = "https://api.themoviedb.org/3/search/movie?api_key=342cd394f089d67c3e28dfc6e965a8b5&language=en-US&query=";
        $query .=  $keyword;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $query,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $hasil = json_decode($response, true);
            return $hasil['total_results'];
        }
    }

    public function create_short_overview($str, $max_length)
    {
        if ($str == "") {
            return "No sinopsis specified";
        }
        return strlen($str) > $max_length ? substr($str, 0, $max_length) . "..." : $str;;
    }

    public function paginateResultTMDB($data)
    {
        $recordPerPage = RECORD_PER_PAGE;
        $page = 1;
        if (isset($data['page'])) {
            $page = $data['page'];
        }
        $output = '';

        $curl = curl_init();

        $currentPageQuery = "https://api.themoviedb.org/3/search/movie?api_key=342cd394f089d67c3e28dfc6e965a8b5&language=en-US&page=";
        $currentPageQuery .= $page;
        $currentPageQuery .= "&query=";
        $currentPageQuery .=  $data['keyword'];

        curl_setopt_array($curl, array(
            CURLOPT_URL => $currentPageQuery,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $hasil = json_decode($response, true);
        $pageNum = $hasil['page'];
        $totalPages = $hasil['total_pages'];
        if ($hasil['results'] > 0) {
            foreach ($hasil['results'] as $movie) {
                $overview = $this->create_short_overview($movie['overview'], 150);
                $output .= "
            <div class=\"film-wrapper\">
                <div class=\"main-content\">
                    <img class=\"film-thumbnail\" src=\"http://image.tmdb.org/t/p/w154/" . $movie['poster_path'] . "\" >
                    <div class=\"film-detail-wrapper\"><br>
                        <span class=\"title\"> " . $movie['title'] . "</span><br>
                            <span class=\"rating\">
                                <img src=\"" . BASE_URL . "/assets/icon/star-solid.svg\" alt=\"rating-star\" class=\"svg-big\">
                                " . $movie['vote_average'] . "/10
                            </span><br>
                        <span class=\"sinopis\">
                            " . $overview . "
                        </span><br>
                    </div>
                </div>
                <span class=\"film-details-link\">
                    <a class=\"link detail-button\" href=\"" . BASE_URL . "/film/index/" . $movie['id'] . "\">view details
                        <img src=\"" . BASE_URL . "/assets/icon/right-arrow.svg\" alt=\"view-details\" class=\"svg-med\">
                    </a>
                </span>
            </div>
            <hr>";
            }
        }
        $output .= $this->renderPaginationElementTMDB($totalPages, $pageNum);
        return $output;
    }


    public function renderPaginationElementTMDB($totalPages, $pageNum)
    {
        if ($totalPages == 1) {
            return "";
        }
        $output = '';

        $lastMovieNum = $pageNum + 5 > $totalPages ? $totalPages : $pageNum + 5;
        $output .= '<span class="pagination_wrapper">';
        $firstArrowClass = $pageNum == 1 ? 'disabled'  : '';
        $prevArrowClass = $pageNum -  1 == 0 ? 'disabled'  : '';

        if ($pageNum > 1) {
            $output .= "<span class='pagination_link ";
            $output .= "' onClick='loadData(";
            $output .= 1;
            $output .= ")'> first  </span>";

            $output .= "<span class='pagination_link ";
            $output .= "' onClick='loadData(";
            $output .= $pageNum - 1;
            $output .= ")'> prev  </span>";
        } else {
            $output .= "<span class='pagination_link ";
            $output .= $firstArrowClass;
            $output .= "'> first  </span>";

            $output .= "<span class='pagination_link ";
            $output .= $prevArrowClass;
            $output .= "'> prev  </span>";
        }
        $firstPageNum = $pageNum - 3 < 1 ? 1 : $pageNum - 3;
        $LastPageNum = $pageNum + 3 < $totalPages ? $pageNum + 3 : $totalPages;
        for ($i = $firstPageNum; $i <= $LastPageNum; $i++) {
            if ($i == $pageNum) {
                $output .= "<span class='pagination_link disabled' id='" . $i . "' disabled >" . $i . "</span>";
            } else {
                $output .= "<span class='pagination_link' id='" . $i . "' onClick='loadData(" . $i . ")'>" . $i . "</span>";
            }
        }
        $nextArrowClass = $pageNum + 1 > $totalPages ? 'disabled'  : '';
        $lastArrowClass = $pageNum == $totalPages ? 'disabled'  : '';

        if ($pageNum < $totalPages) {
            $output .= "<span class='pagination_link ";
            $output .= "' onClick='loadData(";
            $output .= $pageNum + 1;
            $output .= ")'> next  </span>";

            $output .= "<span class='pagination_link ";
            $output .= "' onClick='loadData(";
            $output .= $totalPages;
            $output .= ")'> last  </span>";
        } else {
            $output .= "<span class='pagination_link ";
            $output .= $nextArrowClass;
            $output .= "'> next  </span>";

            $output .= "<span class='pagination_link ";
            $output .= $lastArrowClass;
            $output .= "'> last  </span>";
        }

        $output .= '</span>';
        return $output;
    }
}