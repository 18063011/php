<?php
class login
{
	private function connect()
		{
			$con =mysql_connect("localhost","root","");
			if(!$con)
			{
				echo 'Không kết nối duoc csdl';
				exit();
			}
			else
			{
				mysql_select_db("vivobook"); 
				mysql_query("SET NAMES UTF8"); 
				return $con;
			}
		}
	public function mylogin($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select * from taikhoan where  tentaikhoan='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$tentaikhoan=$row['tentaikhoan']; 
				$matkhau=$row['matkhau']; 
				$phanquyen=$row['phanquyen']; 
				$id_kh=$row['id_kh'];
				$id_admin=$row['id_admin'];
				$id_shipper=$row['id_shipper'];
                if($phanquyen ==1){
                    session_start();
					$_SESSION['id']=$id;
					$_SESSION['tentaikhoan']=$tentaikhoan;
					$_SESSION['matkhau']=$matkhau;
                    return 1;
                }

			}
			
		  }
		else
		{   
			return 0;
		}
	}
	public function myloginhs($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select id, mataikhoan, matkhau,  magiaovien, mahocsinh,tentaikhoan, maqtvct,maqt from taikhoan where mahocsinh='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$mataikhoan=$row['mataikhoan']; 
				$matkhau=$row['matkhau'];  
				$magiaovien=$row['magiaovien']; 
				$mahocsinh=$row['mahocsinh']; 	
				$ten=$row['tentaikhoan']; 
				$maqt=$row['maqt'];	
				$idmonhoc=$row['idmonhoc'];
				session_start();
					$_SESSION['id']=$id;
					$_SESSION['mataikhoan']=$user;
					$_SESSION['matkhau']=$pass;
					$_SESSION['idmonhoc']=$idmonhoc;
	
			}
			return 1;
		  }
		else
		{
			return 0;
		}
	}
	public function myloginqtv($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select id, mataikhoan, matkhau, magiaovien, mahocsinh,tentaikhoan, maqtvct,maqt from taikhoan where maqtvct='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$mataikhoan=$row['mataikhoan']; 
				$matkhau=$row['matkhau']; 
				$magiaovien=$row['magiaovien']; 
				$mahocsinh=$row['mahocsinh']; 
				$ten=$row['tentaikhoan']; 
				$maqtvct=$row['maqtvct'];
				$maqt=$row['maqt'];	
				$idmonhoc=$row['idmonhoc'];
				session_start();
					$_SESSION['id']=$id;
					$_SESSION['mataikhoan']=$user;
					$_SESSION['matkhau']=$pass;
					$_SESSION['idmonhoc']=$idmonhoc;
			
			}
			return 1;
		  }
		else
		{
			return 0;
		}
	}
	public function myloginqt($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select id, mataikhoan, matkhau, magiaovien, mahocsinh,tentaikhoan, maqtvct,maqt from taikhoan where maqt='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$maqt=$row['maqt'];
				$mataikhoan=$row['mataikhoan']; 
				$matkhau=$row['matkhau']; 
				$magiaovien=$row['magiaovien']; 
				$mahocsinh=$row['mahocsinh']; 
				$ten=$row['tentaikhoan']; 
				$maqtvct=$row['maqtvct'];	
				$maqt=$row['maqt'];
				$idmonhoc=$row['idmonhoc'];
				
				session_start();
					$_SESSION['id']=$id;
					$_SESSION['mataikhoan']=$user;
					$_SESSION['matkhau']=$pass;
					$_SESSION['idmonhoc']=$idmonhoc;
			
			}
			return 1;
		  }
		else
		{
			return 0;
		}
	}
	public function mylogintotruong($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select id, mataikhoan, matkhau, magiaovien, mahocsinh,tentaikhoan, maqtvct,maqt,matotruong from taikhoan where matotruong='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$maqt=$row['maqt'];
				$mataikhoan=$row['mataikhoan']; 
				$matkhau=$row['matkhau']; 
				$magiaovien=$row['magiaovien']; 
				$mahocsinh=$row['mahocsinh']; 
				$ten=$row['tentaikhoan']; 
				$maqtvct=$row['maqtvct'];	
				$matotruong=$row['matotruong'];
				$mamon=$row['idmonhoc'];
				session_start();
					$_SESSION['id']=$id;
					$_SESSION['mataikhoan']=$user;
					$_SESSION['matkhau']=$pass;
					$_SESSION['idmonhoc']=$idmonhoc;
			}
			return 1;
		  }
		else
		{
			return 0;
		}
	}
	public function taotaikhoan($sql)
	{
	$link=$this->connect();
	if(mysql_query($sql,$link))
	{
	   return 1;	
	}
	else
	{
	  return 0;	
	}
	}
	function confirmlogin($id,$user,$pass)
	{
		$link=$this->connect();
		$sql="select id from taikhoan where id='$id' and mataikhoan='$user' and matkhau='$pass' limit 1";	
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1)
		{
			header("location:login.php");	
		}
	}
	
}
?>  