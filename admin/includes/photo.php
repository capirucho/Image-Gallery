<?php


	class Photo extends Db_helper {

		protected static $db_table = "photos";
		protected static $db_table_fields = array('id','photo_title', 'photo_description', 'photo_filename', 'photo_type', 'photo_size');
		public $id;
		public $photo_title;
		public $photo_description;
		public $photo_filename;
		public $photo_type;
		public $photo_size;

		public $tmp_path;
		public $upload_directory = "images";
		public $custom_errors = array();
		public $upload_errors_array = array(
			UPLOAD_ERR_OK => "There is no error.",
			UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive.",
			UPLOAD_ERR_FORM_SIZE => "The uploaded file exceed the MAX_FILE_SIZE.",
			UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
			UPLOAD_ERR_NO_FILE => "No file was uploaded turkey.",
			UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
			UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
			UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
		);

		// passing $_FILES['uploaded_file'] as an argument

		public function set_file($file) {

			if(empty($file) || !$file || !is_array($file)) {
				$this->custom_errors[] = "No file was uploaded.";
				return false;

			} elseif ($file['error'] != 0) {
				$this->custom_errors[] = $this->upload_errors_array[$file['error']];
				return false;

			} else {
				$this->photo_filename = basename($file['name']);
				$this->tmp_path = $file['tmp_name'];
				$this->photo_type = $file['type'];
				$this->photo_size = $file['size'];
			}
			
		}

		//get image path on server. this path will be used to dynamically display image on browser.
		public function image_path() {
			return $this->upload_directory.DS.$this->photo_filename;
		}

		public function upload_photo() {

			if($this->id) {
				$this->update();
			} else {

				if(!empty($this->custom_errors)) {
					return false;
				}

				if(empty($this->photo_filename) || empty($this->tmp_path)) {
					$this->custom_errors[] = "the file is not available";
					return false;
				}

				$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->photo_filename;

				if(file_exists($target_path)) {
					$this->custom_errors[] = "The file {$this->photo_filename} already exists";
					return false;
				}

				if(move_uploaded_file($this->tmp_path, $target_path)) {

					if($this->create()) {
						unset($this->tmp_path);
						return true;
					}


				} else {

					$this->custom_errors[] = "something wrong with file directory. permissions?";
					return false;

				}
			
			}

		}

		public function delete_photo() {

			if($this->deleteById()) {
				$target_path = SITE_ROOT . DS . 'admin'. DS . $this->image_path();

				return unlink($target_path) ? true : false;
			} else {

				return false;
			}
		}

	}



?>