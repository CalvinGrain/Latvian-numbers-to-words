<?php
/**
 * Latvian numbers to words
 *
 * Author: Calvin Grain <kalvis@facepalm.lv>
 */

function toCurrency($number)
{
	$result='';
	$decimals='00';
	$digits = array('00','viens','divi','trīs','četri','pieci','seši','septiņi','astoņi','deviņi');
	$prefix = array('','vien','div','trīs','četr','piec','seš','septiņ','astoņ','deviņ');
	$ending = array('desmit','padsmit','simt', 'tūkstoš');
	$single = array('simts','tūkstots');
	$lots = array('simt','simti','tūkstoš','tūkstoši');
	$text = array('un ','eiro ','cents','centi');

	$thousands=$hundreds=$tens="";

	$number = str_replace(array('.',','),'.',$number);

	if(strpos($number,'.')>0)
	{
		$decimals = explode('.',$number);
		$number = $decimals[0];
		$decimals = $decimals[1];
	}

	if(strlen($number)>=4)
	{
		$thousands = substr($number,0,1);
		$hundreds = substr($number,1,1);
		$tens = substr($number,2,1);
		$ones = substr($number,3,1);
	}
	else if(strlen($number)>=3)
	{
		$hundreds = substr($number,0,1);
		$tens = substr($number,1,1);
		$ones = substr($number,2,1);
	}
	else if(strlen($number)>=2)
	{
		$tens = substr($number,0,1);
		$ones = substr($number,1,1);
	}
	else if(strlen($number)>=1)
	{
		$ones = substr($number,0,1);
	}

	//Thousands
	if($thousands!=0)
	{
		if($thousands==1) $result.= $single[1];
		else $result.= $prefix[$thousands].$lots[2];
		$result.=' ';
	}

	//Hundreds
	if($hundreds!=0)
	{
		if($hundreds==1) $result.= $single[0];
		else $result.= $prefix[$hundreds].$lots[0];
		$result.=' ';
	}

	//Tens
	if($tens!=0 && $tens.''.$ones>=20)
	{
		if($tens==1) $result.= $single[0];
		else $result.= $prefix[$tens].$ending[0];
		$result.=' ';
	}

	//Teens
	if($tens!=0 && $tens.''.$ones<20)
	{
		if($tens.''.$ones==10) $result.= $ending[0];
		else $result.= $prefix[$ones].$ending[1];
		$result.=' ';
	}
	else if($ones<10 && $ones>0 || $number==0)
	{
		$result.= $digits[$ones];
		$result.=' ';
	}

	$result.=$text[1];

	if($decimals>0){
		$result.=$text[0];

		$number = $decimals;

		if(strlen($number)>=2)
		{
			$tens = substr($number,0,1);
			$ones = substr($number,1,1);
		}
		else if(strlen($number)>=1)
		{
			$ones = substr($number,0,1);
		}

		//Tens
		if($tens!=0 && $tens.''.$ones>=20)
		{
			if($tens==1) $result.= $single[0];
			else $result.= $prefix[$tens].$ending[0];
			$result.=' ';
		}

		//Teens
		if($tens!=0 && $tens.''.$ones<20)
		{
			if($tens.''.$ones==10) $result.= $ending[0];
			else $result.= $prefix[$ones].$ending[1];
			$result.=' ';
		}
		else if($ones<10 && $ones>0 || $tens==0)
		{
			$result.= $digits[$ones];
			$result.=' ';
		}
		$result.=$text[(($ones==1)?2:3)];
	}
	else
	{
		$result.=$text[0].' 00 '.$text[3];
	}

	return $result;
}
