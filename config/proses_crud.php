<?php
session_start();

require "connection.php";
class ProsesCrud extends Koneksi
{
    private $film_img;

    public function addFilm($post) // method tambah film
    {
        $film_title = htmlspecialchars($post['film_title']);
        $film_genre = htmlspecialchars($post['film_genre']);
        $film_synopsis = htmlspecialchars($post['film_synopsis']);
        $film_year = htmlspecialchars($post['film_year']);
        $film_code = htmlspecialchars($post['film_code']);
        $film_type = htmlspecialchars($post['film_type']);
        $film_rating = htmlspecialchars($post['film_rating']);

        $sql = "INSERT INTO films(film_title, film_genre, film_synopsis, film_year, film_code, film_img, film_type, film_rating) VALUES('$film_title', '$film_genre', '$film_synopsis', '$film_year', '$film_code', '$this->film_img', '$film_type', '$film_rating')";

        $result = $this->conn->query($sql);
        if ($result) {
            echo '<script>alert("successfully added data")
            document.location.href = "../dashboard/index.php";
            </script>';
        } else {
            echo '<script>alert("Failed to add data!")
            </script>';
        }
    } // end of addFilm

    public function title($film_title) // method title
    {
        // sql select data dari database by film_title
        $sql = "SELECT * FROM films WHERE film_title='$film_title'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            return $result;
        } else {
            return false;
        }
    } // end of title

    public function upload($files) // method upload
    {
        $film_img = $files['film_img'];
        $film_imgName = $files['film_img']['name'];
        $film_imgType = $files['film_img']['type'];
        $film_imgTmpName = $files['film_img']['tmp_name'];
        $film_imgError = $files['film_img']['error'];
        $film_imgSize = $files['film_img']['size'];

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $film_imgExt = explode('.', $film_imgName);
        $film_imgValidExt = strtolower(end($film_imgExt));

        // cek ektensi film_img
        if (in_array($film_imgValidExt, $allowed)) {
            // jika tidak ada error, film_img berhasil di upload
            if ($film_imgError === 0) {
                if ($film_imgSize < 1000000) {
                    move_uploaded_file($film_imgTmpName, '../img/films/' . strtolower($film_imgName));
                    $this->film_img = $film_imgName;
                    return $this->film_img;
                } else {
                    echo '<script>alert("Please upload image less than 1mb")</script>';
                    return false;
                }
            } else {
                echo '<script>alert("Error upload image")</script>';
                return false;
            }
        } else {
            echo '<script>alert("Please upload image with extentions jpg, jpeg, png")</script>';
            return false;
        }
    } // end of upload

    public function displayMovies() // method display movies by id
    {
        $sql = "SELECT * FROM films ORDER BY id DESC";
        $result = $this->conn->query($sql);
        // cek jumlah data film dalam database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    } // end of displayFilm

    public function displayTypeMovies() // method display Movies, type Movies
    {
        $sql = "SELECT * FROM films WHERE film_type='Movies' ORDER BY id DESC";
        $result = $this->conn->query($sql);
        // cek jumlah data film dalam database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            } // while
            return $data;
        } // if
    } // end of movies displayMovies

    public function displayTypeSeries() //method display series
    {
        $sql = "SELECT * FROM films WHERE film_type='Series' ORDER BY id DESC";
        $result = $this->conn->query($sql);
        // cek jumlah data film dalam database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            } // while
            return $data;
        } else {
            echo "there are no datas";
        }
    } // end of displaySeries

    public function displayFilmById($id) // method display film by id
    {
        // query data dari database by id
        $sql = "SELECT * FROM films WHERE id='$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        }
    } // displayFilmById

    public function editFilm($post) // method edit film
    {
        $id = $post['id'];
        $film_title = htmlspecialchars($post['film_title']);
        $film_genre = htmlspecialchars($post['film_genre']);
        $film_synopsis = htmlspecialchars($post['film_synopsis']);
        $film_year = htmlspecialchars($post['film_year']);
        $film_code = htmlspecialchars($post['film_code']);
        $film_type = htmlspecialchars($post['film_type']);
        $film_rating = htmlspecialchars($post['film_rating']);

        // query update film
        $sql = "UPDATE films SET film_title='$film_title', film_genre='$film_genre', film_synopsis='$film_synopsis', film_year='$film_year', film_code='$film_code', film_img='$this->film_img', film_type='$film_type', film_rating='$film_rating' WHERE id='$id'";
        $result = $this->conn->query($sql);
        if ($result) {
            echo '<script>alert("Edit Sucsessfully")
            document.location.href = "../dashboard/index.php";
            </script>';
        } else {
            echo '<script>alert("Failed to edit data")
            </script>';
        } // end of editFilm
    }

    public function deleteFilm($id) // method delete film
    {
        // query delete data dari database by id
        $sql = "DELETE FROM films WHERE id='$id'";
        $result = $this->conn->query($sql);
        if ($result) {
            echo '<script>alert("Delete Sucsessfully")
            document.location.href = "../dashboard/index.php";
            </script>';
        } else {
            echo '<script>alert("Failed to delete data")
            </script>';
        }
    } // end of deleteFilm

    public function displayCart($uid) // method display cart
    {
        $sql = "SELECT * FROM cart c JOIN films f ON c.id_film = f.id WHERE id_user = '$uid' ORDER BY f.id ASC";
        $result = $this->conn->query($sql);
        // cek jumlah data cart dalam database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    } // end of displayCart

    public function processLogin($username, $password) // method proses login
    {
        // query select semua data dari tabel user by username
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->conn->query($sql);

        // cek username ada di database
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // cek password yang di input user sama dengan password di database
            if ($row['password'] == md5($password)) {
                // cek tipe user
                if ($row['type'] == 'admin') {
                    // set session
                    $_SESSION['admin'] = true;
                    $_SESSION['id_user'] = $row['id_user'];
                    setcookie($row['username'], $row['id_user'], time() + 86400);
                    echo '<script>alert("Login sucsessfully as admin")
                    document.location.href = "dashboard/index.php";
                    </script>';
                } else if ($row['type'] == 'member') {
                    // set session
                    $_SESSION['member'] = true;
                    $_SESSION['id_user'] = $row['id_user'];
                    setcookie($row['username'], $row['id_user'], time() + 86400);
                    echo '<script>alert("Login sucsessfully as member")
                    document.location.href = "index.php";
                    </script>';
                }
                $_SESSION['login'] = true;
            } else {
                echo '<script>alert("Wrong Password!")
          </script>';
            }
        } else {
            echo '<script>alert("Error Login! Username not found!")
          </script>';
        }
    } // end of prosesLogin
} // end of class ProsesCrud
