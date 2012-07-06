<?php
 //header("Content-Type: text/html;charset=utf-8"); 
/*
	Автор: INSIDIOUS
	Версия: 1.0 (Бета)
	Приминение: Класс для работы с изображениями
*/
class img_resize
{	
	// Объявляем нужные переменные для использования внутри класса
	private $tmpImg = array();
	private $tmpData = array();
	
	private $imgPath = false;
	private $newFile = false;
	private $transperentExt = array('gif','png');
	
	private $waterMarkSet = array(
		'fontAlpha' => 0,
		'fontSize' => 20,
		'fontFamily' => 'tahoma.ttf',
		'fontColors' => array(12, 12, 75),
		
		'imgAlpha' => false,
		
		'position' => 'top',
		'align' => 'left',
		'margin' => 10
	);
	
	/*
		$path 		= путь к изображению
		$quality 	= качество изображения (для итогового изображения)
 	*/
	function __construct($path = false, $quality = 100) {

		// Если исходный файл не найден, возвращаем 
		if($path == false || !file_exists($path))
			return false;
		
		$this->imgPath = $path; // Запоминаем файл для дальнейшей работы
		$info = getimagesize($this->imgPath); // Вытаскиваем информацию об изображении
		
		$this->tmpData['width'] = $info[0]; // Запоминаем ширину изображения
		$this->tmpData['height'] = $info[1]; // Запоминаем высоту изображения
		$this->tmpData['basename'] = basename($this->imgPath); // Запоминаем название файла
		$this->tmpData['extension'] = strtolower(substr($info['mime'], strpos($info['mime'], '/')+1)); // Изнаем тип изображения
		
		 // Узнаем с какими функциями будет работать класс
		$sfunc = 'image' . $this->tmpData['extension'];
		$isfunc = 'imagecreatefrom' . $this->tmpData['extension'];
		
		// Если функции не найдены в ядре php, возвращаем - false
		if(!function_exists($sfunc) || !function_exists($isfunc)) 
			return false;
		
		// Устанавливаем нужное качество для дальнейшей работы над изображением	
		if(in_array($this->tmpData['extension'], $this->transperentExt))
			$this->tmpData['quality'] = (int)($quality >= 9 ? 9 : $quality);
		else
			$this->tmpData['quality'] = (int)($quality > 100 ? 100 : $quality);	
	}
	
	/*
		Метод: Основной обработчик, который создает конечное фото для сохранения
		$width		= ширина нового изображения
		$height		= высота нового изображения
		$savePath	= категория и имя файла, для сохранения
		$arr		= набор данных, для работы с функцией imagecopyresampled (последовательность такая же, как в функции)
		$save 		= true: сохранит изображение, false - лишь сгенерирует новое изображение
	*/
	function createImg($width = false, $height = false, $savePath = false, $arr = array(), $save = true) {

		// Необходимые проверки для дальнейшей работы
		if($this->imgPath == false || $width == false || $height == false || $savePath == false || sizeof($arr) < 8)
			return false;
		
		// Вносим нужные нам функции в переменные
		$sfunc = 'image' . $this->tmpData['extension'];
		$isfunc = 'imagecreatefrom' . $this->tmpData['extension'];
		
		// Узнаем с каким файлом работать
		$src = ($this->newFile != false ? $this->newFile : $this->imgPath);	
		
		// создание нового изображения (начало)
		$this->tmpImg['srcImg'] = $isfunc($src);
		$this->tmpImg['idest'] = imagecreatetruecolor($width, $height);
		
		// Сохраняем PNG с прозрачностью
		if($this->tmpData['extension'] == 'png') {
			
			imagesavealpha($this->tmpImg['idest'], true);
			$trueColour = imagecolorallocatealpha($this->tmpImg['idest'], 0, 0, 0, 127);
    		imagefill($this->tmpImg['idest'], 0, 0, $trueColour);
		
		// Сохраняем GIF с прозрачностью	
		} else if($this->tmpData['extension'] == 'gif') {
			
			$this->tmpImg['idest'] = imagecreate($width, $height);
			$trueColour = imagecolorallocate($this->tmpImg['idest'], 0, 0, 0); 
			imagecolortransparent($this->tmpImg['idest'], $trueColour);
			
		}

		// создание изображения
		if(!imagecopyresampled(
			$this->tmpImg['idest'], 
			$this->tmpImg['srcImg'], 
			$arr[1], $arr[2], $arr[3], $arr[4], 
			$arr[5], $arr[6], 
			$arr[7], $arr[8]
		)) return false;
		
		// Если необходимо - сохраняем изображение
		if($save == true)
			$sfunc($this->tmpImg['idest'], $savePath, $this->tmpData['quality']);
			
		return true;
	}
	
	/*
		Метод: Уменьшает фото пропорционально
		$width		= false: установит значение по умолчанию, Число: Уменьшит пропорционально ширине
		$height		= false: установит значение по умолчанию, Число: Уменьшит пропорционально высоте
		$savePath	= false: папка, в которой находится файл с классом, иначе категория в которую необходимо сохранить изображение
		$nameImg	= false: сгенерирует уникальное имя для нового файла, иначе присвоит отправленное имя
	*/
	function resize($width = false, $height = false, $savePath = false, $nameImg = false) {

		// Необходимые проверки для дальнейшей работы
		if(($this->imgPath == false) || ($width == false && $height == false))
			return false;
		
		 // Определяем итоговое название файла
		$nameImg = $this->getName($nameImg);
		
		// Определяем высоту и ширину изображения		
		$width = (int)($width == false ? $this->tmpData['width'] : $width);
		$height = (int)($height == false ? $this->tmpData['height'] : $height);
		
		// Необходимые проверки на высоту и ширину
		$width = ($width > $this->tmpData['width'] ? $this->tmpData['width'] : $width);
		$height = ($height > $this->tmpData['height'] ? $this->tmpData['height'] : $height);

		// Категория + название файла
		$savePath = ($savePath == false ? str_replace('\\', '/', dirname(__FILE__)) : $savePath) . '/' . $nameImg;		
		
		// Алгоритм (начало)
			$ratio = $width / $height;
			$srcRatio = $this->tmpData['width'] / $this->tmpData['height'];
			
			if($ratio < $srcRatio) 
				$height = $width / $srcRatio;
			else 
				$width = $height * $srcRatio;
		// Алгоритм (конец)
		
		// Сохраняем фото
		if(!$this->createImg(
			$width, 
			$height, 
			$savePath, 
			array( 1 => 0, 0, 0, 0, $width, $height, $this->tmpData['width'], $this->tmpData['height'] )
		)) return false;
		
		// Удаляем временные заготовки
		$this->destroyTmpImg();
		
		// Возвращаем данные об итоговом изображении
		return array(
			'width' => $width, 
			'height' => $height, 
			'path' => pathinfo($savePath, PATHINFO_DIRNAME), 
			'name' => $nameImg
		);
	}
	
	/*
		Метод: Вырезает кусок от изображения
		$width		= false: установит значение по умолчанию, Число: Уменьшит пропорционально ширине
		$height		= false: установит значение по умолчанию, Число: Уменьшит пропорционально высоте
		$savePath	= false: папка, в которой находится файл с классом, иначе категория в которую необходимо сохранить изображение
		$nameImg	= false: сгенерирует уникальное имя для нового файла, иначе присвоит отправленное имя
	*/
	function crop($width = false, $height = false, $savePath = false, $nameImg = false) {

		// Необходимые проверки для дальнейшей работы
		if(($this->imgPath == false) || ($width == false && $height == false))
			return false;
		
		// Определяем файл с которым надо работать
		$src = ($this->newFile != false ? $this->newFile : $this->imgPath);	

		// Определяем итоговое название файла
		$nameImg = $this->getName($nameImg); 
		
		// Категория + название файла
		$savePath = ($savePath == false ? str_replace('\\', '/', dirname(__FILE__)) : $savePath) . '/' . $nameImg;
		
		// Достаем нужную информацию об изрбражении
		$info = getimagesize($src);
		
		// Определяем высоту и ширину изображения
		$width = (int)($width == false ? $info[0] : $width);
		$height = (int)($height == false ? $info[1] : $height);
		
		// Необходимые проверки на высоту и ширину	
		$width = ($width > $info[0] ? $info[0] : $width);
		$height = ($height > $info[1] ? $info[1] : $height);	
		
		// Алгоритм (начало)		
			$srcWidth = $info[0];
			$srcHeight = $info[1];
			
			$setWidth = abs($width);
			$setHeight = abs($height);
		
			$srcX = ceil(($srcWidth - $setWidth) / 2);
			$srcY = ceil(($srcY - $setY) / 2);
			
			if($srcX < 0 || $srcY < 0)
				$srcX = $srcY = 0;
			
			$outWidth = $setWidth;
			$outHeight = $setHeight;
		
			if($srcWidth < $setWidth || $srcHeight < $setHeight) {
				$outWidth = $setWidth = $srcWidth;
				$outHeight = $setHeight = $srcHeight;
			}
		// Алгоритм (конец)
		
		// Сохраняем фото
		if(!$this->createImg(
			$setWidth, 
			$setHeight, 
			$savePath, 
			array( 1 => 0, 0, $srcX, $srcY, $outWidth, $outHeight, $outWidth, $outHeight )
		)) return false;
		
		// Удаляем временные заготовки	
		$this->destroyTmpImg();		
		
		// Возвращаем данные об итоговом изображении
		return array(
			'width' => $outWidth, 
			'height' => $outHeight, 
			'path' => pathinfo($savePath, PATHINFO_DIRNAME), 
			'name' => $nameImg
		);
	}
	
	/*
		Метод: Вырезает изображение, уменьшив пропорционально
		$width		= false: установит значение по умолчанию, Число: Уменьшит пропорционально ширине
		$height		= false: установит значение по умолчанию, Число: Уменьшит пропорционально высоте
		$savePath	= false: папка, в которой находится файл с классом, иначе категория в которую необходимо сохранить изображение
		$nameImg	= false: сгенерирует уникальное имя для нового файла, иначе присвоит отправленное имя
	*/
	function cropThumb($width = false, $height = false, $savePath = false, $nameImg = false) {
		
		// Необходимые проверки для дальнейшей работы
		if(($this->imgPath == false) || ($width == false && $height == false))
			return false;
		
		// Определяем итоговое название файла
		$nameImg = $this->getName($nameImg);
		
		// Определяем высоту и ширину изображения
		$width = (int)($width != false ? $width : $this->tmpData['width']);
		$height = (int)($height != false ? $height : $this->tmpData['height']);
		
		// Необходимые проверки на высоту и ширину	
		$width = ($width > $this->tmpData['width'] ? $this->tmpData['width'] : $width);
		$height = ($height > $this->tmpData['height'] ? $this->tmpData['height'] : $height);	

		// Категория + название файла
		$savePath = ($savePath == false ? str_replace('\\', '/', dirname(__FILE__)) : $savePath);
		
		// Алгоритм (начало)
			$ratio = $width / $height;
			$srcRatio = $this->tmpData['width'] / $this->tmpData['height'];
		// Алгоритм (конец)
		
		// Если фото менее требуемых данных, сохраняем
		if($this->tmpData['width'] <= $width && $this->tmpData['height'] <= $height) {
			
			if(!($arrData = $this->resize($this->tmpData['width'], $this->tmpData['height'], $savePath, $nameImg)))
				return false;
					
		} else {
			
			// Генерируем имя для нового изображения (временного)
			$newName = $this->uniqidName();

			// Если изображение надо уменьшить по высоте
			if($ratio < $srcRatio) {
				if(!$this->resize(false, $height, $savePath, $newName))
					return false;
	
			// Если изображение надо уменьшить по ширине		
			} else {
				if(!$this->resize($width, false, $savePath, $newName))
					return false;
			}

			// Путь к новому файлу
			$this->newFile = $savePath . '/' . $newName;
			
			// Вырезаем нужным нам кусок изображения
			if(!($arrData = $this->crop($width, $height, $savePath, $nameImg)))
				return false;
			
			// Удаляем новый (временный) файл
			unlink($this->newFile);
			$this->newFile = false;	
		}
		
		// Возвращаем данные об итоговом изображении
		return array(
			'width' => $arrData['width'], 
			'height' => $arrData['height'], 
			'path' => pathinfo($arrData['path'], PATHINFO_DIRNAME), 
			'name' => $nameImg
		);
	}
	
	/*
		Метод: Накладывает одно фото на другое (водяной знак)
		$waterMark		= путь к водяному знаку
		$savePath		= false: папка, в которой находится файл с классом, иначе категория в которую необходимо сохранить изображение
		$nameImg		= false: сгенерирует уникальное имя для нового файла, иначе присвоит отправленное имя
	*/
	function waterMarkImg($waterMark = false, $savePath = false, $nameImg = false) {
		
		// Необходимые проверки
		if($this->imgPath == false || !file_exists($waterMark))
			return false;
			
		// Вытаскиваем нужную информацию	
		$infoWaterMark = getimagesize($waterMark);  

		// Узнаем тип водяного знака
		$extWaterMark = strtolower(substr($infoWaterMark['mime'], strpos($infoWaterMark['mime'], '/')+1));

		// Узнаем функции для работы с изображениями
		$sfunc = 'image' . $this->tmpData['extension'];
		$iWaterMarkFunc = 'imagecreatefrom' . $extWaterMark;
		
		// Если функции для водяного знака нет в ядре, возвращаем false
		if(!function_exists($iWaterMarkFunc)) 
			return false;
		
		// Определяем итоговое название для сохранения
		$nameImg = ($nameImg == false ?  $this->tmpData['basename'] : $this->uniqidName());
		
		// Категория + название файла
		$savePath = ($savePath == false ? str_replace('\\', '/', dirname(__FILE__)) : $savePath) . '/' . $nameImg;

		// Формируем изображение, которое потом соединим с воденным знаком
		if(!$this->createImg(
			$this->tmpData['width'], 
			$this->tmpData['height'], 
			$savePath, 
			array( 1 => 0, 0, 0, 0, $this->tmpData['width'], $this->tmpData['height'], $this->tmpData['width'], $this->tmpData['height'] ), 
			false // Не сохраняем фото
		)) return false;
		
		// Открываем водяной знак
		$this->tmpImg['iWaterMark'] = $iWaterMarkFunc($waterMark);
		
		// Вычесляем координаты наложения водяного знака
		$arrCoor = $this->getPosition(
			$infoWaterMark[0], 
			$infoWaterMark[1]
		);
		
		// Если для водяного знака установлена прозрачность и тип НЕ png - Копируем с прозрачностью
		if($extWaterMark != 'png' && $this->waterMarkSet['imgAlpha'] != false) {
			if(!imagecopymerge(
				$this->tmpImg['idest'], 
				$this->tmpImg['iWaterMark'], 
				$arrCoor[0], $arrCoor[1], 0, 0, 
				$infoWaterMark[0], $infoWaterMark[1], 
				$this->waterMarkSet['imgAlpha']
			)) return false;
		} else {
			if(!imagecopy(
				$this->tmpImg['idest'], 
				$this->tmpImg['iWaterMark'], 
				$arrCoor[0], $arrCoor[1], 0, 0, 
				$infoWaterMark[0], $infoWaterMark[1]
			)) return false;
		}
		
		// Сохраняем итоговое изображение
		if(!$sfunc($this->tmpImg['idest'], $savePath, $this->tmpData['quality']))
			return false;
		
		// Удаляем временные заготовки	
		$this->destroyTmpImg();
		
		// Возвращаем данные об итоговом изображении
		return array(
			'position' => $this->waterMarkSet['position'], 
			'align' => $this->waterMarkSet['align'], 
			'path' => pathinfo($savePath, PATHINFO_DIRNAME), 
			'name' => $nameImg, 
			'margin' => $this->waterMarkSet['margin'] 
		);
	}
	
	function waterMarkText($text = false, $savePath = false, $nameImg = false) {
		
		// Необходимые проверки
		if($this->imgPath == false || $text == false)
			return false;
		
		// Узнаем функции для работы с изображением
		$sfunc = 'image' . $this->tmpData['extension'];	
		
		// Определяем итоговое название для сохранения
		$nameImg = ($nameImg == false ?  $this->tmpData['basename'] : $this->uniqidName());
		
		// Категория + название файла
		$savePath = ($savePath == false ? str_replace('\\', '/', dirname(__FILE__)) : $savePath) . '/' . $nameImg;
		
		// Формируем изображение на которое чуть позже будем накладывать текст
		if(!$this->createImg(
			$this->tmpData['width'], 
			$this->tmpData['height'], 
			$savePath, 
			array( 1 => 0, 0, 0, 0, $this->tmpData['width'], $this->tmpData['height'], $this->tmpData['width'], $this->tmpData['height'] ), 
			false // Не сохраняем изображение
		)) return false;
		
		if(!($textInfo = imagettfbbox($this->waterMarkSet['fontSize'], 0, $this->waterMarkSet['fontFamily'], $text)))
			return false;

		// Вычесляем координаты наложения водяного знака
		$arrCoor = $this->getPosition(
			$widthText = ($textInfo[2] - $textInfo[0]), // Ширина текста
			$heightText = ($textInfo[1] - $textInfo[7]), // Высота текста
			'text'
		);
		
		// Устанвливаем цвет для текста		
		$color = imagecolorallocatealpha(
			$this->tmpImg['idest'], 
			$this->waterMarkSet['fontColor'][0], 
			$this->waterMarkSet['fontColor'][1], 
			$this->waterMarkSet['fontColor'][2], 
			$this->waterMarkSet['fontAlpha']
		);
		
		// Рисуем текст на изображении
		if(!imagettftext(
			$this->tmpImg['idest'], 
			$this->waterMarkSet['fontSize'], 
			0, 
			$arrCoor[0], $arrCoor[1], 
			$color, 
			$this->waterMarkSet['fontFamily'], 
			$text
		)) return false;
			
		// Сохраняем итоговое изображение
		if(!$sfunc($this->tmpImg['idest'], $savePath, $this->tmpData['quality']))
			return false;
		
		// Удаляем временные заготовки	
		$this->destroyTmpImg();
		
		// Возвращаем данные об итоговом изображении
		return array(
			'position' => $this->waterMarkSet['position'], 
			'align' => $this->waterMarkSet['align'], 
			'path' => pathinfo($savePath, PATHINFO_DIRNAME), 
			'name' => $nameImg, 
			'margin' => $this->waterMarkSet['margin'] 
		);	
	}
	
	/*
		Метод: Устанавливает данные для водяного знака
	*/
	function waterSettings($arr = array()) {
		if(sizeof($arr) > 0) {
			foreach($arr as $key => $data) {
				if($key == 'fontColors') {
					if(sizeof($data) == 3) {
						for($x = 0; $x < 3; $x++) {
							$this->waterMarkSet[$key][$x] = $data[$x];
						}
					}
				} else {
					if(isset($this->waterMarkSet[$key]))
						$this->waterMarkSet[$key] = $data;
				}
			}
		}
	}
	
	/*
		Метод: Определяет координаты для наложения водяного знака
	*/
	function getPosition($widthWaterMark = false, $heightWaterMark = false, $elemnt = 'img', $destX = 0, $destY = 0) {
		
		if($widthWaterMark == false || $heightWaterMark == false)
			return false;
		
		if($this->waterMarkSet['position'] == 'top') {
			if($elemnt == 'img')
				$destY = $this->waterMarkSet['margin'];
			else	
				$destY = $this->waterMarkSet['margin'] + $heightWaterMark;
			$destX = (
				$this->waterMarkSet['align'] == 'left' 
					? $this->waterMarkSet['margin'] 
					: $this->tmpData['width'] - ($widthWaterMark + $this->waterMarkSet['margin'])
			);
		} else if($this->waterMarkSet['position'] == 'bottom') {
			if($elemnt == 'img')
				$destY = $this->tmpData['height'] - ($heightWaterMark + $this->waterMarkSet['margin']);	
			else	
				$destY = $this->tmpData['height'] - $this->waterMarkSet['margin'];	
			$destX = (
				$this->waterMarkSet['align'] == 'left' 
					? $this->waterMarkSet['margin']
					: $this->tmpData['width'] - ($widthWaterMark + $this->waterMarkSet['margin'])
			);		
		}

		return array($destX, $destY);
	}
	
	/*
		Метод: Генерирует уникальное имя для файла
		$length	= Количество символов
		$ext 	= true: вернет с расширением исходного изображения, false - вернет название файла
	*/
	function uniqidName($length = 7, $ext = true) {

		$arr = array_merge( range(0, 9), range('a','z'), range('A', 'Z') );
		shuffle($arr);

		foreach(array_rand($arr, $length) as $data)
			$key .= $arr[$data];

		if($ext == true)
			return $key . '.' . $this->tmpData['extension'];	
		else
			return $key;
	}
	
	/*
		Метод: Определяет итоговое название файла
	*/
	function getName($nameImg) {

		if($nameImg == false) {
			return $this->uniqidName();
		} else if($nameImg != false) {
			$arr = explode('.', $nameImg);
			if((sizeof($arr > 0)) && (end($arr) != $this->tmpData['extension']))
				return  $nameImg .= '.' . $this->tmpData['extension'];
		}
		
		return $nameImg;
	}
	
	/*
		Метод: Удаляет временные заготовки изображений
	*/
	function destroyTmpImg() {
		foreach($this->tmpImg as $key => $data) {
			imagedestroy($this->tmpImg[$key]);
			unset($this->tmpImg[$key]);
		}
	}
}
?>
