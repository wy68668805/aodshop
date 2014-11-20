<?php
class FilehandleComponent extends Object {
	function file_upload($request_data, $model_name, $field_name,$type = 'edit') {
		$pieces_old = explode('.', $request_data[$model_name][$field_name]['name']);
		$affix_old = array_pop($pieces_old);
		$low = strtolower($affix_old);
		$old_dir = $request_data[$model_name][$field_name]['tmp_name'];
		$ym = date('ym');
		$dir_ym = WWW_ROOT . "upload/{$ym}/";
		if (!is_dir($dir_ym)) {
			mkdir($dir_ym);
		}
		$file_ts = microtime('get_as_float') . ".$affix_old";
		$file_new = "{$dir_ym}{$file_ts}";

		if (move_uploaded_file($old_dir, $file_new)) {
			$request_data[$model_name][$field_name] = "$ym/$file_ts";
		} else {
			if($type == 'edit'){
				unset($request_data[$model_name][$field_name]);
			}else if($type == 'add'){
				$request_data[$model_name][$field_name] = null;
			}
			
		}
		return $request_data;
	}

	function multi_file_upload($request_data, $model_name, $field_name, $parent_field = null, $parent_id = null) {
		foreach ($request_data[$model_name] as $key => $value) {
			if (!empty($value[$field_name]['tmp_name'])) {
				$pieces_old = explode('.', $value[$field_name]['name']);
				$affix_old = array_pop($pieces_old);
				$low = strtolower($affix_old);
				$old_dir = $value[$field_name]['tmp_name'];
				$ym = date('ym');
				$dir_ym = WWW_ROOT . "upload/{$ym}/";
				if (!is_dir($dir_ym)) {
					mkdir($dir_ym);
				}
				$file_ts = microtime('get_as_float') . ".$affix_old";
				$file_new = "{$dir_ym}{$file_ts}";
				if (move_uploaded_file($old_dir, $file_new)) {
					$request_data[$model_name][$key][$field_name] = "$ym/$file_ts";
					if (!empty($parent_field) && !empty($parent_id)) {
						$request_data[$model_name][$key][$parent_field] = $parent_id;
					}
				} else {
					unset($request_data[$model_name][$key][$field_name]);
				}
			} else {
				unset($request_data[$model_name][$key]);
			}

		}
		return $request_data;
	}

	function __h($html) {
		return htmlspecialchars($html);
	}

	function handleimg() {
		
	}

}
