<?php
	
	class HTMLBuilder 
	{
		protected $headerFileName;
		protected $bodyFileName;
		protected $footerFileName;

		public function __construct( $headerFileName, $bodyFileName, $footerFileName ) 
		{
			$this->headerFileName = $headerFileName;
			$this->bodyFileName = $bodyFileName;
			$this->footerFileName = $footerFileName; 
		}

		public function buildHeader() 
		{	
			$allCssFiles = $this->findFiles( "css/", ".css" );
			$this->buildCssLink( $this->allCssFiles );
			include 'html/' . $this->headerFileName;
		}

		public function buildBody() 
		{
			include 'html/' . $this->bodyFileName;
		}

		public function buildFooter() 
		{
			$allJsFiles = $this->findFiles( "js", ".js" );
			$this->buildJsLinks( $this->allJsFiles );
			include 'html/' . $this->footerFileName;
		}

		public function findFiles( $directory, $extension ) 
		{
			$allFiles = glob( $directory . "/*" . $extension);
			return $this->allFiles;
		}

		protected function buildJsLink( $allJsFiles ) 
		{
			$jsArray = array();

			foreach( $allJsFiles as $js ) 
			{
				$file
			}


		}

		protected function buildCssLink() 
		{
			$this->findFiles( "css", ".css");


		}
	}
?>