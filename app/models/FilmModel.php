<?php

define('RECORD_PER_PAGE', 20);

class FilmModel
{
    private $table = 'film';
    private $db;

    // Query to get data from TMDB

    public function getAllTMDB()
    {
        $time_now = time()*1000; //Time now in milisecond
        $time_seven_day_ago = $time_now - 1573640048000;

        $curl = curl_init();

        $query = "https://api.themoviedb.org/3/discover/movie?api_key=342cd394f089d67c3e28dfc6e965a8b5&language=en-US&";
        $query .= "language=en-US&release_date.gte=";
        $query .= $time_seven_day_ago;
        $query .= "&release_date.lte=";
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
            // var_dump($hasil);
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
            // var_dump($hasil);
            return $hasil;
        }
    }


    public function paginateResultTMDB($data)
    {
        $recordPerPage = RECORD_PER_PAGE;
        $page = 1;
        if (isset($data['page'])) {
            $page = $data['page'];
        }
        $output = '';
        // $output = $this->renderPaginationElement($data['keyword'], $page);
        $startFrom = ($page - 1) * $recordPerPage;

        // $this->db->query(
        //     "SELECT * FROM {$this->table} WHERE title LIKE :title ORDER BY film_id DESC LIMIT :startFrom, :recordPerPage"
        // );
        // $this->db->bind('title', '%' . $data['keyword'] . '%');
        // $this->db->bind('startFrom', $startFrom);
        // $this->db->bind('recordPerPage', $recordPerPage);
        // $result = $this->db->resultset();

        $curl = curl_init();

        $query = "https://api.themoviedb.org/3/search/movie?api_key=342cd394f089d67c3e28dfc6e965a8b5&language=en-US&pages=";
        $query .= $page;
        $query .= "&query=";
        $query .=  $data['keyword'];

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

        $hasil = json_decode($response, true);


        if ($hasil['results'] > 0) {
            foreach ($hasil['results'] as $movie) {
                $output .= "
            <div class=\"film-wrapper\">
                <div class=\"main-content\">
                    <img src=\"http://image.tmdb.org/t/p/w154/".$movie['poster_path']."\" 
                    <div class=\"film-detail-wrapper\"><br>
                        <span class=\"title\"> " . $movie['title'] . "</span><br>
                            <span class=\"rating\">
                                <img src=\"" . BASE_URL . "/assets/icon/star-solid.svg\" alt=\"rating-star\" class=\"svg-big\">
                                " . $movie['vote_average'] . "
                            </span><br>
                        <span class=\"sinopis\">
                            " . $movie['overview'] . "
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

        $output .= $this->renderPaginationElementTMDB($data['keyword'], $page);

        return $output;
    }


    public function renderPaginationElementTMDB($keyword, $pageNum)
    {
        $output = '';
        // $this->db->query(
        //     "SELECT * FROM {$this->table}  WHERE title LIKE :title ORDER BY film_id DESC"
        // );
        // $this->db->bind('title', '%' . $keyword . '%');

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

        $hasil = json_decode($response, true);

        $totalRecords = sizeof($hasil);
        $totalPages = ceil($totalRecords / RECORD_PER_PAGE);
        if ($totalPages <= 1) {
            return $output;
        }
        $output .= '<span class="pagination_wrapper">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $pageNum) {
                $output .= "<span class='pagination_link disabled' id='" . $i . "' disabled >" . $i . "</span>";
            } else {
                $output .= "<span class='pagination_link' id='" . $i . "' onClick='loadData(" . $i . ");scrollWin()'>" . $i . "</span>";
            }
        }
        $output .= '</span>';
        var_dump($output);
        return $output;
    }

    // =============== Until here =================

    public function __construct()
    {
        $this->db = new Database();
    }

    //TO DO chane to get all
    public function getAllCurrentFilm()
    {
        date_default_timezone_set(date_default_timezone_get());
        $currentDate = date('Y-m-d', time());
        $this->db->query(
            "SELECT * FROM {$this->table}" // WHERE YEAR(release_date) = 2019 AND MONTH(release_date) = 11"
        );
        $this->db->bind('date', $currentDate);
        var_dump($this->db->resultSet());
        return $this->db->resultSet();
    }

    public function getFilmById($id)
    {
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE film_id={$id} "
        );
        return $this->db->resultSet()[0];
    }

    public function getResult($keyword)
    {
        $query = "
            SELECT * from {$this->table} WHERE title LIKE :keyword
        ";
        $this->db->query($query);
        $this->db->bind('keyword', "%" . $keyword . "%");
        // var_dump($this->db->resultset());
        return $this->db->resultset();
    }

    public function paginateResult($data)
    {
        $recordPerPage = RECORD_PER_PAGE;
        $page = 1;
        if (isset($data['page'])) {
            $page = $data['page'];
        }
        $output = '';
        // $output = $this->renderPaginationElement($data['keyword'], $page);
        $startFrom = ($page - 1) * $recordPerPage;
        $this->db->query(
            "SELECT * FROM {$this->table} WHERE title LIKE :title ORDER BY film_id DESC LIMIT :startFrom, :recordPerPage"
        );
        $this->db->bind('title', '%' . $data['keyword'] . '%');
        $this->db->bind('startFrom', $startFrom);
        $this->db->bind('recordPerPage', $recordPerPage);
        $result = $this->db->resultset();
        if ($result > 0) {
            foreach ($result as $movie) {
                $output .= "
            <div class=\"film-wrapper\">
                <div class=\"main-content\">
                    <img src=\"" . BASE_URL . "/assets/img/film/" . $movie['thumbnail'] . "\" class=\"film-thumbnail\">
                    <div class=\"film-detail-wrapper\">
                        <span class=\"title\"> " . $movie['title'] . "</span><br>
                            <span class=\"rating\">
                                <img src=\"" . BASE_URL . "/assets/icon/star-solid.svg\" alt=\"rating-star\" class=\"svg-big\">
                                " . $movie['rating'] . "
                            </span><br>
                        <span class=\"sinopis\">
                            " . $movie['sinopsis'] . "
                        </span><br>
                    </div>
                </div>
                <span class=\"film-details-link\">
                    <a class=\"link detail-button\" href=\"" . BASE_URL . "/film/index/" . $movie['film_id'] . "\">view details
                        <img src=\"" . BASE_URL . "/assets/icon/right-arrow.svg\" alt=\"view-details\" class=\"svg-med\">
                    </a>
                </span>
            </div>
            <hr>";
            }
        }

        $output .= $this->renderPaginationElement($data['keyword'], $page);

        return $output;
    }


    public function renderPaginationElement($keyword, $pageNum)
    {
        $output = '';
        $this->db->query(
            "SELECT * FROM {$this->table}  WHERE title LIKE :title ORDER BY film_id DESC"
        );
        $this->db->bind('title', '%' . $keyword . '%');
        $totalRecords = sizeof($this->db->resultset());
        $totalPages = ceil($totalRecords / RECORD_PER_PAGE);
        if ($totalPages <= 1) {
            return $output;
        }
        $output .= '<span class="pagination_wrapper">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $pageNum) {
                $output .= "<span class='pagination_link disabled' id='" . $i . "' disabled >" . $i . "</span>";
            } else {
                $output .= "<span class='pagination_link' id='" . $i . "' onClick='loadData(" . $i . ");scrollWin()'>" . $i . "</span>";
            }
        }
        $output .= '</span>';

        return $output;
    }
}