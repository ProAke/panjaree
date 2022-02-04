<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created : 7/01/2011
Author : JIE'software
E-mail : jie@pacificserver.net
Website : www.pacificserver.net
Blog : www.digitalmediathai.com
Copyright (C) 2011, JIE SOFT by Diigtal Media Advance Services Co.,Ltd. all rights reserved.
*****************************************************************/
/**
# Class SplitPage
# Example

if(!is_numeric($CurrentPage)) $CurrentPage = 0;

$sp = new SplitPage();
$sp->intTotalItem = 540;
$sp->intItemPerPage = 12;
$sp->intCurrentPage = $CurrentPage;

$sp->intItemPageShow = 10;
$sp->booShowAllPage = false;
$sp->strLinkClass = "";
$sp->strLinkParam = "";
$sp->strMsgSplit = "|";
$sp->strPrevPage = "&lt;";
$sp->strNextPage = "&gt;";
$sp->strFirstPage = "&lt;&lt;";
$sp->strLastPage = "&gt;&gt;";
$sp->strCurrentPageColor = "#FF0000";

print $sp->Show();
**/

class SplitPage{
	var $intTotalItem = 0;
	var $intItemPerPage = 0;
	var $intTotalPage = 0;
	var $intCurrentPage = 0;
	var $intItemPageShow = 10;

	var $booShowAllPage = true;
	
	var $strPageShow = "";
	var $strLinkClass = "page-numbers";
	var $strLinkParam = "";

	var $strMsgSplit = "";

	var $strPrevPage = "< Prev";
	var $strNextPage = "Next >";
	
	var $strFirstPage = "&lt;&lt; First";
	var $strLastPage = "Last &gt;&gt;";

	var $strCurrentPageColor = "#FF0000";

	function Show(){

		if(!is_numeric($this->intCurrentPage)){
			$this->intCurrentPage = 0;
		}

		if($this->strLinkClass != ""){
			$this->strLinkClass = "class=\"".$this->strLinkClass."\"";
		}

		$this->intTotalPage = (int)($this->intTotalItem / $this->intItemPerPage);
		
		if(($this->intTotalItem % $this->intItemPerPage) != 0){
			$this->intTotalPage++;
		}
		
		// First & Prev
		if(!$this->booShowAllPage){
			if($this->intCurrentPage > 1){
				//$this->strPageShow .= "<li><a href='?page=1&".$this->strLinkParam."' ".$this->strLinkClass.">".$this->strFirstPage."&nbsp;</a></li>";
			}

			if($this->intCurrentPage > 1){
				$this->strPageShow .= "<li class='btn btn-default'><a href='".$this->strLinkParam."".($this->intCurrentPage - 1)."'>".$this->strPrevPage."</a></li>";
			}
		}


		// Show Page
		$intStartPage = (int)($this->intCurrentPage - (int)($this->intItemPageShow/2));
		$intStopPage = (int)($this->intCurrentPage + (int)($this->intItemPageShow/2));

		if($intStopPage > $this->intTotalPage){
			$intStartPage = $this->intTotalPage - $this->intItemPageShow;
			$intStopPage = $this->intTotalPage;
		}

		if($intStartPage < 0){
			$intStartPage = 0;
			$intStopPage = $this->intItemPageShow;

			if($intStopPage > $this->intTotalPage){
				$intStopPage = $this->intTotalPage;
			}
		}

		if($this->booShowAllPage){
			$intStartPage = 0;
			$intStopPage = $this->intTotalPage;
		}
		
		// Loop Page
		if($intStopPage > 1){
			while($intStartPage < $intStopPage){
				if($this->intCurrentPage != ($intStartPage+1)){
					$this->strPageShow .= "<li class='btn btn-default'><a href='".$this->strLinkParam."".($intStartPage+1)."' ".$this->strLinkClass.">".($intStartPage+1)."</a></li>";
				}else{
					$this->strPageShow .= "<li class='btn btn-default'><a>".($intStartPage+1)."</a></li>";
				}
				$this->strPageShow .= $this->strMsgSplit."";
				$intStartPage++;
			}
		}

		// Next & Last
		if(!$this->booShowAllPage){
			if($this->intCurrentPage < $this->intTotalPage){
				$this->strPageShow .= "<li class='btn btn-default'><a href='".$this->strLinkParam."".($this->intCurrentPage + 1)."' ".$this->strLinkClass.">".$this->strNextPage."</a></li>";
			}

			if($this->intCurrentPage < $this->intTotalPage){
				//$this->strPageShow .= "<li><a href='?page=".$this->intTotalPage."&".$this->strLinkParam."' ".$this->strLinkClass.">".$this->strLastPage."&nbsp;</a></li>";
			}
		}

		return $this->strPageShow;
	}

}

?>