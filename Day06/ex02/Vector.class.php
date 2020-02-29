<?php

	require_once 'Vertex.class.php';

	class Vector
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w;
		static $verbose;
		
		public function __construct($array)
        {
			$_w = 0;
			$verbose = false;
			if (isset($array['dest']) && $array['dest'] instanceof Vertex) 
			{
				if (isset($array['orig']) && $array['orig'] instanceof Vertex) 
				{
                    $orig = new Vertex(array('x' => $array['orig']->getX(), 'y' => $array['orig']->getY(), 'z' => $array['orig']->getZ()));
				} 
				else 
				{
                    $orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
                }
                $this->_x = $array['dest']->getX() - $orig->getX();
                $this->_y = $array['dest']->getY() - $orig->getY();
                $this->_z = $array['dest']->getZ() - $orig->getZ();
                $this->_w = 0;
            }
            if (Self::$verbose)
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
		
		function __destruct()
        {
            if (Self::$verbose)
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
        }

        function __toString()
        {
            return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
        }

        public static function doc()
        {
            $read = fopen("Vector.doc.txt", 'r');
            echo "\n";
            while ($read && !feof($read))
                echo fgets($read);
            echo "\n";
        }

        public function getX()
        {
            return $this->_x;
        }

        public function getY()
        {
            return $this->_y;
        }

        public function getZ()
        {
            return $this->_z;
        }


        public function getW()
        {
            return $this->_w;
		}
		
		public function magnitude()
		{
			$x2 = $this->_x * $this->_x;
			$y2 = $this->_y * $this->_y;
			$z2 = $this->_z * $this->_z;
			$mag = (float)(sqrt(($x2) + ($y2) + ($z2)));
			return $mag;
		}

		public function normalize()
        {
            $magd = $this->magnitude();
            if ($magd == 1) {
                return clone $this;
			}
			
			$xn =  $this->_x / $magd;
			$yn =  $this->_y / $magd;
			$zn =  $this->_z / $magd;

			$destn = new Vertex(array('x'=> $xn,'y'=> $yn,'z'=> $zn));

            return new Vector(array('dest' => $destn));
		}
		
		public function add(Vector $rhs)
		{
			$xa = $this->_x + $rhs->_x;
			$ya = $this->_y + $rhs->_y;
			$za =  $this->_z + $rhs->_z;

			$desta = new Vertex(array('x'=> $xa,'y'=> $ya,'z'=> $za));

            return new Vector(array('dest' => $desta));
		}

		public function sub(Vector $rhs)
		{
			$xs = $this->_x - $rhs->_x;
			$ys = $this->_y - $rhs->_y;
			$zs =  $this->_z - $rhs->_z;

			$dests = new Vertex(array('x'=> $xs,'y'=> $ys,'z'=> $zs));

            return new Vector(array('dest' => $dests));
		}

		public function opposite()
		{
			$xo = $this->_x * -1;
			$yo = $this->_y * -1;
			$zo =  $this->_z * -1;

			$desto = new Vertex(array('x'=> $xo,'y'=> $yo,'z'=> $zo));

            return new Vector(array('dest' => $desto));
		}

		public function scalarProduct($k)
		{
			$xk = $this->_x * $k;
			$yk = $this->_y * $k;
			$zk =  $this->_z * $k;

			$destk = new Vertex(array('x'=> $xk,'y'=> $yk,'z'=> $zk));

            return new Vector(array('dest' => $destk));
		}

		public function dotProduct(Vector $rhs)
		{
			$xd = $this->_x * $rhs->_x;
			$yd = $this->_y * $rhs->_y;
			$zd =  $this->_z * $rhs->_z;

			$dot_product = $xd + $yd + $zd;

            return  $dot_product;
		}

		public function cos(Vector $rhs)
		{
			$xuv = $this->_x * $rhs->_x;
			$yuv = $this->_y * $rhs->_y;
			$zuv = $this->_z * $rhs->_z;

			$xu2 = $this->_x * $this->_x;
			$yu2 = $this->_y * $this->_y;
			$zu2 = $this->_z * $this->_z;

			$xv2 = $rhs->_x * $rhs->_x;
			$yv2 = $rhs->_y * $rhs->_y;
			$zv2 = $rhs->_z * $rhs->_z;

			return ((($xuv) + ($yuv) + ($zuv)) / sqrt((($xu2) + ($yu2) + ($zu2)) * (($xv2) + ($yv2) + ($zv2))));
		}

		public function crossProduct(Vector $rhs)
        {
            return new Vector(array('dest' => new Vertex(array(
                'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
                'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
                'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()
            ))));
        }
	}
?>