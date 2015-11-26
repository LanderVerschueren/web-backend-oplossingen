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

			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();
		}

		public function buildHeader() 
		{	
			$allCssFiles = $this->findFiles( "css", ".css" );

			include 'html/' . $this->headerFileName;
		}

		public function buildBody() 
		{
			include 'html/' . $this->bodyFileName;
		}

		public function buildFooter() 
		{
			$allJsFiles = $this->findFiles( "js", ".js" );
			
			include 'html/' . $this->footerFileName;
		}

		public function findFiles( $directory, $extension ) 
		{
			$allFiles = glob( $directory . "/*" . $extension);
			return $allFiles;
		}
	}
?>