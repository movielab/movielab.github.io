<?php
class CSSPagination
{
	private $totalrows;
	private $rowsperpage;
	private $website;
	private $separate;
	private $page;
	private $sql;
		
	public function __construct($totalrows, $rowsperpage, $website, $separate = '&')
	{
		$this->totalrows = $totalrows;
		$this->website = $website;
		$this->rowsperpage = $rowsperpage;
		$this->separate = $separate;
	}
	
	public function setPage($page)
	{
		if (!$page) { $this->page=1; } else  { $this->page = $page; }
	}
	
	public function getLimit()
	{
		return ($this->page - 1) * $this->rowsperpage;
	}
	
	private function getLastPage()
	{
		return ceil($this->totalrows / $this->rowsperpage);
	}
	
	public function showPage()
	{
		$pagination = "";
		$lpm1 = $this->getLastPage() - 1;
		$page = $this->page;
		$prev = $this->page - 1;
		$next = $this->page + 1;
		
		$pagination .= "<div class=\"nav-links\">";
		
		
		
		if ($this->getLastPage() > 1)
		{
			if ($page > 1) 
				$pagination .= '<a rel="nofollow" class="prev page-numbers" href='.$this->website.$this->separate.'page='.$prev.'> <i class="fa-arrow-left"></i></a>';
			else
				$pagination .= '<a class="prev page-numbers disabled" rel="nofollow" href="#"><i class="fa-arrow-left"></i></a>';
			
			
			if ($this->getLastPage() < 9)
			{	
				for ($counter = 1; $counter <= $this->getLastPage(); $counter++)
				{
					if ($counter == $page)
						$pagination .= '<a class="page-link current" rel="nofollow" href="#">'.$counter.'</a>';
					else
						$pagination .= '<a class="page-link" rel="nofollow\" href='.$this->website.$this->separate.'page='.$counter.'>'.$counter.'</a>';					
				}
			}
			
			elseif($this->getLastPage() >= 9)
			{
				if($page < 4)		
				{
					for ($counter = 1; $counter < 6; $counter++)
					{
						if ($counter == $page)
							$pagination .= "<a class=\"page-link current\" rel=\"nofollow\" href=\"#\">".$counter."</a>";
						else
							$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page='.$counter.'">'.$counter.'</a>';					
					}
					//$pagination .= "...";
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page='.$lpm1.'">'.$lpm1.'</a>';
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page='.$this->getLastPage().'">'.$this->getLastPage().'</a>';		
				}
				elseif($this->getLastPage() - 3 > $page && $page > 1)
				{
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page=1">1</a>';
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page=2">2</a>';
					//$pagination .= "...";
					for ($counter = $page - 1; $counter <= $page + 1; $counter++)
					{
						if ($counter == $page)
							$pagination .= "<a class=\"page-link current\" rel=\"nofollow\" href=\"#\">".$counter."</a>";
						else
							$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page='.$counter.'">'.$counter.'</a>';					
					}
					$pagination .= "<a class=\"page-link current extend\" rel=\"nofollow\" href='#'>...</a>";
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page='.$lpm1.'">'.$lpm1.'</a>';
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page='.$this->getLastPage().'">'.$this->getLastPage().'</a>';		
				}
				else
				{
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page=1">1</a>';
					$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page=2">2</a>';
					$pagination .= "<a class=\"page-link current\" rel=\"nofollow\" href='#'>...</a>";
					for ($counter = $this->getLastPage() - 4; $counter <= $this->getLastPage(); $counter++)
					{
						if ($counter == $page)
							$pagination .= "<a class=\"page-link current\" rel=\"nofollow\" href=\"#\">".$counter."</a>";
						else
							$pagination .= '<a class="page-link" rel="nofollow" href="'.$this->website.$this->separate.'page='.$counter.'">'.$counter.'</a>';					
					}
				}
			}
		
		if ($page < $counter - 1) 
			$pagination .= '<a rel="nofollow" href="'.$this->website.$this->separate.'page='.$next.'" class="next page-numbers"><i class=fa-arrow-right></i></a>';
		else
			$pagination .= "<a class=\"next page-numbers disabled\" rel=\"nofollow\" href=\"#\"><i class=\"fa-arrow-right\"></i></a>";
		$pagination .= "</div>\n";			
		}	
					
		return $pagination;
	}
}
?>