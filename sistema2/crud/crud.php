<?php
	
	require_once "conexion2.php";

	Class Crud extends Conexion {
		public function mostrarDatos(){
			$sql= "SELECT  id,
						  nombre,
						  estado
					from producto";

			$query = Conexion::conectar()->prepare($sql);
			$query->execute();
			return $query->fetchAll();
			$query->close();
		}

		public function insertarDatos($datos){
			$sql="INSERT into producto (nombre, estado) values (:nombre,:estado)";
			$query= Conexion::conectar()->prepare($sql);
			$query->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$query->bindParam(":estado", $datos["estado"], PDO::PARAM_STR); 

			return $query->execute(); 

			$query->close();
		}

		public function obtenerDatos($id){
			$sql= "SELECT id,
						   nombre,
						  estado
					from producto where `id`=:id";
			$query = Conexion::conectar()->prepare($sql);
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			$query->execute();
			return $query->fetch();
			$query = close();
		}

		public function actualizarDatos($datos){
			$sql= "UPDATE producto set nombre = :nombreu,estado = :estadou where id = :id";
			$query = Conexion::conectar()->prepare($sql);
			$query->bindParam(":nombreu", $datos["nombre"], PDO::PARAM_STR);
			$query->bindParam(":estadou", $datos["estado"], PDO::PARAM_STR); 
			$query->bindParam(":id", $datos["id"], PDO::PARAM_INT);
			
			$query->execute();

			$query = close();
		}

		public function eliminarDatos($id){
			$sql= "DELETE from producto where id=:id";
			$query= Conexion::conectar()->prepare($sql);
			$query->bindParam(":id", $id, PDO::PARAM_INT);
			return $query->execute();
			$query = null;
		}
	}

?>