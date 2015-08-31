<?php
/**
 * Latvian numbers to words
 *
 * @author: Calvin Grain <kalvis@facepalm.lv>
 *
 */
class lvnumtowords
{
	public
		$thousands, $hundreds, $tens, $ones, $number, $decimals, $result;

	private function check_length($number)
	{
		$this->thousands = '';
		$this->hundreds = '';
		$this->tens = '';
		$this->ones = '';

		if(strlen($number)>=4)
		{
			$this->thousands = substr($number,0,1);
			$this->hundreds = substr($number,1,1);
			$this->tens = substr($number,2,1);
			$this->ones = substr($number,3,1);
		}
		else if(strlen($number)>=3)
		{
			$this->hundreds = substr($number,0,1);
			$this->tens = substr($number,1,1);
			$this->ones = substr($number,2,1);
		}
		else if(strlen($number)>=2)
		{
			$this->tens = substr($number,0,1);
			$this->ones = substr($number,1,1);
		}
		else if(strlen($number)>=1)
		{
			$this->ones = substr($number,0,1);
		}
	}

	private function convert_to_words()
	{
		$decimals='00';
		$digits = array('00','viens','divi','trīs','četri','pieci','seši','septiņi','astoņi','deviņi');
		$prefix = array('','vien','div','trīs','četr','piec','seš','septiņ','astoņ','deviņ');
		$ending = array('desmit','padsmit');
		$single = array('simts','tūkstotis');
		$lots = array('simti','tūkstoši');

		//Thousands
		if($this->thousands!=0)
		{
			if($this->thousands==1) $this->result.= $digits[$this->thousands].' '.$single[1];
			else $this->result.= $digits[$this->thousands].' '.$lots[1];
			$this->result.=' ';
		}
		//Hundreds
		if($this->hundreds!=0)
		{
			if($this->hundreds==1) $this->result.= $single[0];
			else $this->result.= $digits[$this->hundreds].' '.$lots[0];
			$this->result.=' ';
		}
		//Tens
		if($this->tens!=0 && $this->tens.''.$this->ones>=20)
		{
			if($this->tens==1) $this->result.= $single[0];
			else $this->result.= $prefix[$this->tens].$ending[0];
			$this->result.=' ';
		}
		//Teens and ones
		if($this->tens!=0 && $this->tens.''.$this->ones<20)
		{
			if($this->tens.''.$this->ones==10) $this->result.= $ending[0];
			else $this->result.= $prefix[$this->ones].$ending[1];
			$this->result.=' ';
		}
		else if($this->ones<10 && $this->ones>0 || $this->number==0)
		{
			$this->result.= $digits[$this->ones];
			$this->result.=' ';
		}
	}

	public function toCurrency($number)
	{
		$this->result = "";
		$text = array('un ','eiro ','cents','centi');
		$number = str_replace(array('.',','),'.',$number);

		if(strpos($number,'.')>0)
		{
			$decimals = explode('.',$number);
			$number = $decimals[0];
			$decimals = $decimals[1];
		}
		$this->check_length($number);
		$this->number = $number;
		$this->convert_to_words();
		$this->result.=$text[1];

		if($decimals>0)
		{
			$this->result.=$text[0];
			$this->check_length($decimals);
			$this->convert_to_words();
			$this->result.=$text[(($this->ones==1)?2:3)];
		}
		else
		{
			$this->result.=$text[0].' 00 '.$text[3];
		}
		return $this->result;
	}
}
