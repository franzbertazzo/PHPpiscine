<?php

	require_once 'Color.class.php';

	class Vertex
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w;
		private $_color;
		static $verbose;
		
		function __construct($xyzwc)
		{
			$verbose = false;
			$this->_x = $xyzwc['x'];
			$this->_y = $xyzwc['y'];
			$this->_z = $xyzwc['z'];
			$this->_w = 1;
			if (isset($xyzwc['w']) && !empty($xyzwc['w']))
			{
				$this->_w = $xyzwc['w'];
			}
			if (isset($xyzwc['color']) && !empty($xyzwc['color']) && $xyzwc['color'] instanceof Color)
			{
				$this->_color = $xyzwc['color'];
			}
			else
			{
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			}
			if (Self::$verbose)
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}

		function __destruct()
        {
            if (Self::$verbose)
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
		
		function __toString()
        {
            if (Self::$verbose)
                return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}
		
		public static function doc()
        {
            $read = fopen("Vertex.doc.txt", 'r');
            echo "\n";
            while ($read && !feof($read))
                echo fgets($read);
            echo "\n";
		}
		
		public function getX()
        {
            return $this->_x;
        }

        public function setX($x)
        {
            $this->_x = $x;
        }

        public function getY()
        {
            return $this->_y;
        }

        public function setY($y)
        {
            $this->_y = $y;
        }

        public function getZ()
        {
            return $this->_z;
        }

        public function setZ($z)
        {
            $this->_z = $z;
        }

        public function getW()
        {
            return $this->_w;
        }

        public function setW($w)
        {
            $this->_w = $w;
        }

        public function getColor()
        {
            return $this->_color;
        }

        public function setColor($color)
        {
            $this->_color = $color;
        }

	}
?>