<?php

/**
 * @version $Id: pdfExport.class.php
 * @package Iriscope 
 * @copyright (C) 2004 - 2009 Mobile Aspects India Pvt. Ltd. 
 * @license http://www.mobileaspects.com/
 */

class ExportPDF {
	// a4 size page settings
	public $margin = 37; //pixels
	public $font_height_px = 11; // approximate pixels height=10 for font size 11
	public $font_size = 9; // font size for records display
	public $header_font_size = 9; // font size for labels and titles diaplay
	public $text_out_px = 3; // each text should dispaly after 3 pixels from starting pixels
	public $max_char_length = 20; // approximate 8 field 15 chars, if more then 8 field need reduce the value
	public $font_file = "/usr/share/fonts/truetype/msttcorefonts/verdana.ttf"; // normal font for records display
	public $bold_font_file = "/usr/share/fonts/truetype/msttcorefonts/verdanab.ttf"; // bold font for labels display
	public $title = null; // title of the pdf file
	public $max_field = 7; // for portrait display
	public $min_field = 5; // for portrait display
	public $group = null; // if any grouping - maximum 1 group level
	public $width = 876; // default a4 - landscape size width pixels
	public $height = 620; // default a4 - landscape size height pixels
	public $landscape = null; // based on the display fields the display will vary. by default a4 - portrait 
	public $font_width_px = 6; // approximate pixels width=5 for font size 11
	public $total_records = null ; // total no of records
	public $total_fields = null;  // total no of fields
	public $total_labels = null;  // total no of labels depends on fields
	public $group_field = null;  // currently maximum 1 group name
	public $labels = null; // labels depends on fields
	public $spx = null; // starting point x axis
	public $spy = null; // starting point y axis
	public $epx = null; // end point x axis
	public $epy = null; // end point y axis
	public $logo = null; // logo object for the pdf file
	public $img_logo = "images/pdf_logo.jpg"; // logo for the pdf file
	public $logo_width = null; // width of the logo - maximum pdf file width
	public $logo_height = 40; // height of the logo
	public $logo_properties = array(); // for getting the height, width and type of logo.
	public $field_length = array(); // for finding pixels for field display
	public $fields = array(); // users input fields for dispaly records - associate array.
	public $records = array(); // users input records for display values
	public $group_records = array(); // group records - currently maximum 1
	public $group_labels = array(); // group labels - currently maximum 1
	public $nspx = array(); // for getting next starting point x axis for records display. 
	public $doc = null; // pdf document object
	public $page = null; // pdf page object get from document object
	public $bonus_char_length = 0; // if we have extra pexels we can add to each field.

	// main function for export pdf file
	/**
	* $records are array of data which is displayed in the pdf
	* $labels are each column header, value should be comma separated string
	* $fields are each column display field, using an associative $records array 
	* $title is title of the pdf file 
	* $group_label is grouping $records array, maximum group 1. eg: week
	* $group_field is grouping data display, maximum group 1. eg: department
	**/
	function PDFExport($records=null, $labels=null, $fields=null, $title=null, $group_labels=null, $group_field=null) {
		$sFileName = date("dmyhis");
		$sFile = '/tmp/'.$sFileName.".pdf";

		//print_r($records);
		//print_r($labels);
		//print_r($fields);
		$this->page = null;
		$this->doc = null;
		$this->group_records = array();
		$this->records = $records;
		$this->labels = $labels;
		$this->fields = $fields;
		$this->nspx = array();
		$this->field_length = array();
		if ($group_labels) {
			$this->group_labels = $group_labels;
			// get group fields
			$this->group = count($this->group_labels);
		} else {
			$this->group = null;
		}
		if ($group_field) {
			$this->group_field = $group_field;
		}
		$this->title = $title;

		//print_r($this->records);
		//print_r($this->fields);
		//print_r($this->labels);
		//print_r($this->group_labels);

		// get total number of records
		$this->total_records = count($this->records);

		if ($this->labels) {
			$this->labels = explode(",", $this->labels);
		}

		// get total number of fields 
		$this->total_labels = count($this->labels);

		// select dynamic display size based on the field 
		if ($this->total_labels > $this->max_field) {
			$this->landscape = 1; 
		} else if ( $this->min_field >= $this->total_labels) {
			$this->landscape = 0; 
			$this->max_char_length = 25;
			$this->font_width_px = 4;
		} else {
			$this->landscape = 1; 
			$this->max_char_length = 30;
			$this->font_width_px = 4;
		}

		// set automatic paper display either portrait or landscape.
		if ($this->landscape) {
			$this->width = 876; //pixels
			$this->height = 620; //pixels
		} else {
			$this->width = 620; //pixels
			$this->height = 876; //pixels
		}

		// get fields/labels length 
		if (count($this->labels) > 0) {
			// get max length for all columns 
			foreach($this->labels as $label) {
				$fl = strlen($label);
				if ($fl > $this->max_char_length) {
					$slabel = $this->splitStringWithPattern($label, $this->max_char_length, " ");
					$alabel = split("\n", $slabel);
					//print_r($alabel);
					if (count($alabel) > 1) {
						$vl = 0;
						foreach($alabel as $plabel) {
							if (strlen($plabel) > $vl) {
								$vl = strlen($plabel);
							}
						}
						$fl = $vl;
					}
				}
				$this->field_length[] = $fl;
			}
			//print_r($this->field_length);

			// get max length for column values 
			foreach($this->records as $record) {
				for($i = 0; $i < count($this->fields); $i++) {
					$rfl = $this->field_length[$i];
					$fvl = strlen($record[$this->fields[$i]]);
					if ($fvl > $this->max_char_length) {
						$svalue = $this->splitStringWithPattern($record[$this->fields[$i]], $this->max_char_length, " ");
						$avalue = preg_split("/\n/", $svalue);
						//print_r($avalue);
						if (count($avalue) > 1) {
							$vl = 0;
							foreach($avalue as $value) {
								if (strlen($value) > $vl) {
									$vl = strlen($value);
								}
							}
							$fvl = $vl;
						}
					}
					if ($fvl > $rfl) {
						$this->field_length[$i] = $fvl;
					}
				}	
			}
			//print_r($this->field_length);
		}

		// grouping records maximum 1 level
		if ($this->total_records > 0 && $this->group) {
			foreach($this->records as $record) {
				$this->group_records[$record[$this->group_field]][] = $record;
			}
			//print_r($this->group_records);
			
			foreach($this->group_records as $key => $gr) {
				// check and sum if any cost field in the field list
				if ( preg_match("/cost/i", $cost_field = implode(",", $this->fields), $matches)) {
					foreach($gr as $r) {
						$cost += $r[$matches[0]];
					}
					$gr['total'] = $cost; 
				} else {
					$gr['total'] = count($gr);
				}
				$grec[$key] = $gr;
			}
			$this->records = $grec;
			//print_r($this->records);
			//exit;
		}

		//echo $this->height;
		//echo $this->width;
		//exit;
		// get starting point pixels for x and y axis
		$this->spx = $this->epy = $this->margin;
		if (file_exists($this->img_logo)) {
			$this->spy = $this->height - ($this->logo_height + $this->margin);
		} else {
			$this->spy = $this->height - $this->margin;
		}
		// get end point pixels for x axis
		$this->epx = $this->width - $this->margin; 

		//echo $this->width." - ".$this->margin." = ".$this->epx;

		// get next field display
		$this->nextXAxis();
		//print_r($this->nspx);
		//exit;

		// initialize the haru object
		$this->doc = new HaruDoc;
		$this->doc->setPageMode(HaruDoc::PAGE_MODE_USE_THUMBS); // show thumbnails 

		// get/set fonts for headers display
		$this->bold_font = $this->doc->loadTTF($this->bold_font_file, TRUE);
		$this->bfont = $this->doc->getFont($this->bold_font);

		// get/set fonts for records display
		$this->user_font = $this->doc->loadTTF($this->font_file, TRUE);
		$this->font = $this->doc->getFont($this->user_font);

		// for logo display
		if (file_exists($this->img_logo)) {
			$this->logo = $this->doc->loadJPEG($gAbsolute_Path.$this->img_logo);
			$this->logo_properties = $this->logo->getSize();
			//print_r($this->logo_properties);
			$this->logo_width = $this->logo_properties['width'];
			$this->logo_height = $this->logo_properties['height'];
		}

		// for records display 
		$this->displayRecords();

		$this->doc->save($sFile);
		header('Pragma: public');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");                  // Date in the past   
		header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1
		header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1
		header ("Pragma: no-cache");
		header("Expires: 0");
		header('Content-Transfer-Encoding: none');

		// We'll be outputting a PDF
		header('Content-type: application/pdf');

		// It will be called downloaded.pdf
		header('Content-Disposition: attachment; filename='.basename($sFile));
		// The PDF source is in original.pdf
		readfile($sFile);
		chmod($sFile, 0777);
		unlink($sFile);
		exit;
	}

	// split the string with pattern/space and return splited string
	function splitStringWithPattern($str=null, $size=null, $pattern=null) {
		// if no pattern use defualt space pattern
		$pattern = empty($pattern) ? "[\040]+" : $pattern; 
		$words = preg_split("/$pattern/", trim($str), -1);

		// get max size of the the words and over write size
		foreach($words as $word) {
			if (strlen($word) > $size) {
				$size = strlen($word);
			}	
		}

		if ($size) {
			for($i=0, $r=0; $i < count($words); $i++) {
				if (strlen($line[$r] . $words[$i] . ' ') <= $size) {
					$line[$r] .= $words[$i] . ' ';
				} else {   
					$r++;
					if ($iSize < strlen($words[$i])) {
						$iSize = strlen($words[$i]);
					}
					$line[$r] .= $words[$i] . ' ';
				}   
			}   
			//print_r($line);
			$data = implode("\n", $line);
		} else {
			$data = implode("\n", $words);
		}

		// if a word contains more then 20 chars then split the word
		if (preg_match("/\n/", $data) && $size <= $this->max_char_length) {
			return trim($data);
		} else {
			return $data = $this->splitString($str, $this->max_char_length);
		}
	}   

	// split the string with out pattern using maximum length and return the splitted string.
	function splitString($string=null, $string_length=1) {
		if(strlen($string)>$string_length || !$string_length) {
			do {
				$c = strlen($string);
				$parts[] = trim(substr($string,0,$string_length));
				$string = substr($string,$string_length);
			} while($string !== false);
		} else {
			$parts = array($string);
		}   
		if (is_array($parts) && count($parts) > 0) {
			$parts = implode("\n", $parts);
		}
		return trim($parts);
	}

	// split the string with out pattern using maximum length and return the splitted string.
	function splitStringOptional($str=null, $size=1) {
		if(strlen($str) > $size) {
			// if no pattern use defualt space pattern
			$pattern = empty($pattern) ? "[\040]+" : $pattern; 
			$words = preg_split("/$pattern/", trim($str), -1);
			if ($size) {
				for($i=0, $r=0; $i < count($words); $i++) {
					if (strlen($remain . $words[$i] . ' ') <= $size) {
						$parts[$r++] = $remain.' '.$words[$i] . ' ';
						$flag = true;
					} else {   
						$parts[$r++] = substr($words[$i], 0, $size).' ';
						$remain = substr($words[$i], -(strlen($words[$i])-$size));
						$flag = false;
					}   
				}   
				//echo count($words)."/".$i."/".$r;
				if (!$flag) {
					$parts[] = $remain;
				}
				//print_r($parts);
				if (is_array($parts) && count($parts) > 0) {
					$parts = implode("\n", $parts);
				}
				return trim($parts);
			}
		} else {
			return $str;	
		}
	}

	// get next x point for field and value display
	function nextXAxis() {
		$tspx = $this->spx;
		for( $n = 0; $n < count($this->field_length)+1; $n++) {
			$this->nspx[] = $tspx;
			if ($this->field_length[$n]) {
				$tspx += $this->field_length[$n]*$this->font_width_px;
			} 
		}
		//print_r($this->field_length);
		//print_r($this->nspx);

		// if end point pixel less then the field width then add the some divident value to field length.
		if ( $this->epx > $this->nspx[count($this->nspx)-1] ) {
			$fepx = round(($this->epx - $this->nspx[count($this->nspx)-1]) / count($this->field_length));
			// for getting bonus char width
			$this->bonus_char_length = floor($fepx / $this->font_width_px)-0.5;
			for($i = 0; $i < count($this->field_length); $i++) {
				$this->field_length[$i] += $this->bonus_char_length;
			}
		}
		//print_r($this->field_length);

		// final pixels for next fields
		$this->nspx = array();
		$tspx = $this->spx;
		for( $n = 0; $n < count($this->field_length)+1; $n++) {
			$this->nspx[] = $tspx;
			if ($this->field_length[$n]) {
				//echo $this->field_length[$n].'*'.$this->font_width_px;
				$tspx += $this->field_length[$n]*$this->font_width_px;
			} 
		}
		//print_r($this->nspx);
		//exit;
		//return $this->nspx;
	}

	// add page(s)
	function addPage() {
		$this->page = $this->doc->addPage(); // add page to the document 
		$this->page->setSize(HaruPage::SIZE_A4, HaruPage::LANDSCAPE); // set the page to use A4 landscape format 
		$this->page->setWidth($this->width);
		$this->page->setHeight($this->height);
		$this->page->setFontAndSize($this->font, $this->font_size); // set font and size 
	}

	// add header every page(s)
	function pageHeader($pdfpage) {
		$tspy = $this->spy;

		// get end point pixel for column width
		if ($this->epx > $this->nspx[count($this->nspx)-1]) {
			$fepx = $this->epx - $this->margin;
		} else {
			$fepx = $this->nspx[count($this->nspx)-1];
		}

		// display logo and title
		$this->page->setFontAndSize($this->bfont, $this->header_font_size); // set font and size 
		if (file_exists($this->img_logo)) {
			$this->page->drawImage($this->logo, $this->spx, $this->height - $this->logo_height, $this->logo_width, $this->logo_height);
		}

		$this->page->beginText(); // display text
		$this->page->textOut($this->width/2, $this->height - ($this->margin - 5), $this->title); // display the report title
		$this->page->endText(); // finish display text

		// display all labels
		if ($this->group) {
			// header display colors
			$this->page->setRGBStroke(0.6, 0.6, 0.6); // set line color 
			$this->page->setRGBFill(0.8, 0.8, 0.8); // set filling color 
			$this->page->rectangle($this->spx, $tspy+$this->text_out_px, $fepx, -($this->font_height_px+$this->font_height_px));
			$this->page->fillStroke(); // fill and stroke it 

			// text and line display color
			$this->page->setRGBStroke(0.6, 0.6, 0.6); // set line color 
			$this->page->setRGBFill(0, 0, 0); // set filling color 
			$this->page->beginText(); // display text
			$this->page->textOut($this->nspx[0]+$this->text_out_px, $tspy - $this->font_height_px, $this->group_labels[0]);
			if ($this->group_labels[1]) {
				//$this->page->textOut($this->nspx[count($this->nspx)-3]+$this->text_out_px, $tspy - $this->font_height_px, $this->group_labels[1]);
				$this->page->textOut($this->epx - (strlen($this->group_labels[1])*$this->max_field), $tspy - $this->font_height_px, $this->group_labels[1]);
			}
			$this->page->endText(); // finish display text
			$tspy = $tspy-($this->font_height_px+$this->text_out_px+$this->text_out_px);
		}

		// for counting the new lines
		$label_lines = 1;
		for( $n = 0; $n < count($this->nspx); $n++) {
			//$label = $this->splitStringWithPattern($this->labels[$n], $this->max_char_length + $this->bonus_char_length, " ");
			$label = $this->splitStringWithPattern($this->labels[$n], $this->max_char_length, " ");
			$alabel = array();
			$alabel = preg_split("/\n/", $label);
			$cll = count($alabel);
			if ($cll > $label_lines) {
				$label_lines = $cll; 
			}
		}

		// for rectangle
		$rect = -$label_lines*($this->font_height_px+($this->text_out_px*3));

		// header display colors
		$this->page->setRGBStroke(0.6, 0.6, 0.6);
		$this->page->setRGBFill(0.8, 0.8, 0.8);
		//echo $this->spx, $tspy, $fepx, $rect;
		$this->page->rectangle($this->spx, $tspy, $fepx, $rect);
		$this->page->fillStroke(); // fill and stroke it 

		// text display color
		$this->page->setRGBStroke(0.6, 0.6, 0.6); // set line color 
		$this->page->setRGBFill(0, 0, 0); // set filling color 
		for( $n = 0; $n < count($this->nspx); $n++) {
			//$label = $this->splitStringWithPattern($this->labels[$n], $this->max_char_length + $this->bonus_char_length, " ");
			$label = $this->splitStringWithPattern($this->labels[$n], $this->max_char_length, " ");
			$alabel = array();
			$alabel = preg_split("/\n/", $label);
			$cll = count($alabel);
			$nspy = $tspy - $this->font_height_px;
			if ($cll > $label_lines) {
				$label_lines = $cll; 
			}
			for($t = 0; $t < $cll; $t++) {
				$this->page->beginText(); // display text
				$this->page->textOut($this->nspx[$n]+$this->text_out_px, $nspy-$this->text_out_px, $alabel[$t]);
				$this->page->endText(); // display text
				$nspy -= $this->font_height_px;
			}
			// for drawing the column line (vertical line)
			/*$this->page->setRGBStroke(0.8, 0.8, 0.8);
			$this->page->setRGBFill(1, 1, 1); // set filling color 
			$this->page->moveTo($nspx[$n], $spy);
			$this->page->lineTo($nspx[$n], $epy);
			$this->page->fillStroke(); // fill and stroke it */
		}

		// for drawing the second row line (harizondal line) for field end
		$tspy = $tspy-($label_lines*($this->text_out_px*3));

   		//printing the footer text
		$company = "www.mobileaspects.com";
		$this->page->beginText(); // display text
		$this->page->textOut($this->nspx[0]+$this->text_out_px, $epy+$this->font_height_px+$this->text_out_px, date("m/d/Y h:i:s A"));
		$this->page->textOut($this->width/2, $epy+$this->font_height_px+$this->text_out_px, "Page Number $pdfpage");
		$this->page->textOut($this->width-(strlen($company)*8), $epy+$this->font_height_px+$this->text_out_px, $company);
		$this->page->endText(); // finish display text

		return $tspy;
	}

	// display all records
	function displayRecords() {
		if (!$this->group) {
			$this->group_records[] = $this->records;
		} else {
			$this->group_records = $this->records;
		}
		//print_r($this->group_records);
		
		// get end point pixel for column width
		if ($this->epx > $this->nspx[count($this->nspx)-1]) {
			$fepx = $this->epx - $this->margin;
		} else {
			$fepx = $this->nspx[count($this->nspx)-1];
		}

		// for page count and display.
		$pdfpage = 1;

		$this->addPage();
		$tspy = $this->pageHeader($pdfpage);
		$this->page->setFontAndSize($this->font, $this->font_size); // set font and size 

		// text and line display color
		$this->page->setRGBStroke(0, 0, 0); // set line color 
		$this->page->setRGBFill(0, 0, 0); // set filling color 

		// outer loop - row wise record
		$color = 0;
		foreach($this->group_records as $key => $records) {
			if ($this->group) {
				// header display colors
				$tspy = $tspy-($this->font_height_px*$this->text_out_px);
				$this->page->setRGBStroke(0.6, 0.6, 0.6); // set line color 
				//$this->page->setRGBFill(0.0, 0.6, 1.0);
				$this->page->setRGBFill(0.6, 0.8, 0.8);
				$this->page->rectangle($this->spx, $tspy, $fepx, 22);
				$this->page->fillStroke(); // fill and stroke it 

				// text and line display color
				$this->page->setRGBStroke(0.6, 0.6, 0.6); // set line color 
				$this->page->setRGBFill(0, 0, 0); // set filling color 
				$this->page->beginText(); // display text
				if (preg_match("/week/i", $this->group_field)) {
					$key = "Week of $key";
				}
				$this->page->textOut($this->nspx[0]+$this->text_out_px, $tspy + ($this->text_out_px*2), $key);
				if ($this->group_labels[1]) {
					$this->page->textOut($this->nspx[count($this->nspx)-2]+$this->text_out_px, $tspy + ($this->text_out_px*2), $records['total']);
					//$grand_total += $records['total'];
				}
				$grand_total += $records['total'];
				$this->page->endText(); // finish display text
				$tspy = $tspy + ($this->font_height_px);
			}

			// inner loop - row wise record
			for($r = 0; $r < count($records); $r++) {
				$value_lines = 1;

				// field loop - column wise
				for( $n = 0; $n < count($this->nspx); $n++) {
					//echo $records[$r][$this->fields[$n]];
					//$value = $this->splitStringWithPattern($records[$r][$this->fields[$n]], $this->max_char_length + $this->bonus_char_length, " ");
					$value = $this->splitStringWithPattern($records[$r][$this->fields[$n]], $this->max_char_length, " ");
					$avalue = array();
					$avalue = preg_split("/\n/", $value);
					$clv = count($avalue);
					if ($clv > $value_lines) {
						$value_lines = $clv; 
					}
				}
				$tnspy = $tspy - $this->font_height_px;
				$nrspy = $tnspy-($value_lines*$this->font_height_px+$this->text_out_px);

				// value color display
				if ($color) {
					$this->page->setRGBStroke(0.8, 0.8, 0.8);
					$this->page->setRGBFill(1, 1, 1);
					$color = 0;
				} else {
					$this->page->setRGBStroke(0.8, 0.8, 0.8);
					//$this->page->setRGBFill(0.7, 0.8, 1.0);
					$this->page->setRGBFill(0.6, 0.8, 1.0);
					$color = 1;
				}

				if ($value_lines > 2) {
					$tnrspy = -$value_lines*($this->font_height_px+1);
				} else {
					$tnrspy = -$value_lines*($this->font_height_px+$this->text_out_px);
				}

				if ($nrspy > $this->epy) {
                    $this->page->rectangle($this->spx, $tspy-($this->font_height_px), $fepx, $tnrspy);
					$this->page->fillStroke(); // fill and stroke it 
				}

				// text and line display color
				$this->page->setRGBStroke(0, 0, 0); // set line color 
				$this->page->setRGBFill(0, 0, 0); // set filling color 

				for( $n = 0; $n < count($this->nspx); $n++) {
					//echo $records[$r][$this->fields[$n]];
					//$value = $this->splitStringWithPattern($records[$r][$this->fields[$n]], $this->max_char_length + $this->bonus_char_length, " ");
					$value = $this->splitStringWithPattern($records[$r][$this->fields[$n]], $this->max_char_length, " ");
					$avalue = array();
					$avalue = preg_split("/\n/", $value);
					$clv = count($avalue);
					$nspy = $tspy - $this->font_height_px;
					if ($clv > $value_lines) {
						$value_lines = $clv; 
					}
					// check whether the record can be print in this page. if not add page and header
					$cspy = $nspy-($value_lines*$this->font_height_px+$this->text_out_px);
					if ($cspy > $this->epy) {
						for($t = 0; $t < $clv; $t++) {
							$this->page->beginText(); // display text
							$this->page->textOut($this->nspx[$n]+$this->text_out_px, $nspy-$this->font_height_px, $avalue[$t]);
							$this->page->endText(); // finish display text
							$nspy -= $this->font_height_px;
						}
					} else {
						$value_lines = 1;
						$next_page = 1;
						--$r;
						break;
					}
				}
				//echo $nrspy."=>".$cspy."<br />";
				// add next page and header
				if ($next_page) {
					$this->addPage();
					$tspy = $this->pageHeader(++$pdfpage);
					$this->page->setFontAndSize($this->font, $this->font_size); // set font and size 
					$next_page = 0;
				} else {
					// print last line for every page
					if ($value_lines > 2) {		
						$tspy = $tspy-($value_lines*($this->font_height_px+1));
					} else {
						$tspy = $tspy-($value_lines*($this->font_height_px+$this->text_out_px));
					}
				}
			}
			// print last line for every page
			$tspy = $tspy+($value_lines*($this->font_height_px+$this->text_out_px));
			$color = empty($color) ? $color=1 : $color=0;
		}
		// for grand total display
		if ($this->group_labels[2]) {
			$this->page->beginText(); // display text
			$this->page->textOut($this->nspx[0]+$this->text_out_px, $nspy, $this->group_labels[2]);
			$this->page->textOut($this->nspx[count($this->nspx)-2]+$this->text_out_px, $nspy, $grand_total);
			$this->page->endText(); // finish display text
		}
		//exit;
	}
}
?>
