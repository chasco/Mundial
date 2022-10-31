<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partidos_model extends CI_Model
{

	public function list_partidos()
	{

		$query = $this->db->query("SELECT n_codpartido, n_codequipo1, n_codequipo2, eq1.c_equipo c_equipo1, eq2.c_equipo c_equipo2, eq1.c_bandera c_bandera1, eq2.c_bandera c_bandera2, n_goles1, n_goles2, d_fecha, c_hora, c_estado 
								   FROM partidos par, equipos eq1, equipos eq2
								   WHERE par.n_codequipo1 = eq1.n_codequipo
								   AND par.n_codequipo2 = eq2.n_codequipo
								   ORDER BY d_fecha");
		return $query;

	}

	public function get_partido($pn_codpartido)
	{

		$query = $this->db->query("SELECT * 
								   FROM partidos 
								   WHERE n_codpartido = ".$pn_codpartido);

		$res = $query->row();

		return $res;

	}

	public function list_equipos()
	{

		$query = $this->db->query("SELECT *
								   FROM equipos");

		return $query;

	}

	public function update_partido($data)
	{

		$this->db->query("UPDATE partidos 
						  SET n_goles1 = ".$data['n_goles1'].",
						  n_goles2 = ".$data['n_goles2'].",
						  c_estado = '".$data['c_estado']."'
						  WHERE n_codpartido = ".$data['n_codpartido']);

		if ($data['c_estado'] == 'FIN')
		{
/*
			$querycount = $this->db->query("SELECT COUNT(*) n_count
											FROM apuestas_partido apu
											WHERE n_codpartido = ".$data['n_codpartido']." 
											AND exists (SELECT 1 FROM partidos 
           												WHERE n_codpartido = apu.n_codpartido 
           												AND n_goles1 = apu.n_goles1 
           												AND n_goles2 = apu.n_goles2)");

			$rescount = $querycount->row();

			if($rescount->n_count <> '0')
			{

				$respartido = $this->partidos_model->get_partido($data['n_codpartido']);

				$premio = $respartido->n_monto_apuesta / $rescount->n_count;

				$querywin = $this->db->query("SELECT * 
											  FROM apuestas_partido apu
											  WHERE n_codpartido = ".$data['n_codpartido']."
											  AND exists (SELECT 1 FROM partidos
											  			  WHERE n_codpartido = apu.n_codpartido
											  			  AND n_goles1 = apu.n_goles1
											  			  AND n_goles2 = apu.n_goles2)");

				foreach ($querywin->result() as $row):

					$this->db->query("UPDATE usuarios 
									  SET n_saldo = n_saldo + ".$premio."
									  WHERE n_coduser = ".$row->n_coduser);

					$this->db->query("UPDATE partidos 
									  SET n_monto_apuesta = n_monto_apuesta - ".$premio."
									  WHERE n_codpartido = ".$row->n_codpartido);

				endforeach;

			}

		}
*/

		$respartido = $this->partidos_model->get_partido($data['n_codpartido']);

		if ($respartido->n_goles1 - $respartido->n_goles2 > 0)
		{

			$this->db->query("UPDATE partidos 
						  SET n_resultado = ".$respartido->n_codequipo1."
						  WHERE n_codpartido = ".$data['n_codpartido']); 

		}
		elseif ($respartido->n_goles1 - $respartido->n_goles2 < 0)
		{

			$this->db->query("UPDATE partidos 
						  SET n_resultado = ".$respartido->n_codequipo2."
						  WHERE n_codpartido = ".$data['n_codpartido']);

		}
		elseif ($respartido->n_goles1 - $respartido->n_goles2 == 0)
		{

			$this->db->query("UPDATE partidos 
						  SET n_resultado = 0
						  WHERE n_codpartido = ".$data['n_codpartido']);

		}	

				$querywin = $this->db->query("SELECT * 
											  FROM apuestas_partido apu
											  WHERE n_codpartido = ".$data['n_codpartido']."
											  AND exists (SELECT 1 FROM partidos
											  			  WHERE n_codpartido = apu.n_codpartido
											  			  AND n_goles1 = apu.n_goles1
											  			  AND n_goles2 = apu.n_goles2)");

				foreach ($querywin->result() as $row):

					$this->db->query("UPDATE usuarios 
									  SET n_puntos = n_puntos + 2
									  WHERE n_coduser = ".$row->n_coduser);

				endforeach;

				$querypuntos = $this->db->query("SELECT * 
											  FROM apuestas_partido apu
											  WHERE n_codpartido = ".$data['n_codpartido']."
											  AND exists (SELECT 1 FROM partidos
											  			  WHERE n_codpartido = apu.n_codpartido
											  			  AND n_resultado = apu.n_resultado)");

				foreach ($querypuntos->result() as $row):

					$this->db->query("UPDATE usuarios 
									  SET n_puntos = n_puntos + 1
									  WHERE n_coduser = ".$row->n_coduser);

				endforeach;

		}		

	}

	public function add_partido($data)
	{

		$this->db->query("INSERT INTO partidos (n_codequipo1, n_codequipo2, d_fecha, c_hora) 
						  VALUES (".$data['n_codequipo1'].",".$data['n_codequipo2'].",'".$data['d_fecha']."','".$data['c_hora']."')");

	}

	public function list_nextpartidos()
	{

		$query = $this->db->query("SELECT n_codpartido, n_codequipo1, n_codequipo2, eq1.c_equipo c_equipo1, eq2.c_equipo c_equipo2, eq1.c_bandera c_bandera1, eq2.c_bandera c_bandera2, n_goles1, n_goles2, d_fecha, c_estado, c_hora 
								   FROM partidos par, equipos eq1, equipos eq2
								   WHERE par.n_codequipo1 = eq1.n_codequipo 
								   AND par.n_codequipo2 = eq2.n_codequipo 
								   AND d_fecha = (SELECT MIN(d_fecha) 
								   				  FROM partidos 
								   				  WHERE c_estado <> 'FIN')");

		return $query;

	}

	public function list_partidos_apuestas()
	{

		$query = $this->db->query("SELECT n_codpartido, n_codequipo1, n_codequipo2, eq1.c_equipo c_equipo1, eq2.c_equipo c_equipo2, eq1.c_bandera c_bandera1, eq2.c_bandera c_bandera2, n_goles1, n_goles2, d_fecha, c_estado, n_monto_apuesta 
								   FROM partidos par, equipos eq1, equipos eq2
								   WHERE par.n_codequipo1 = eq1.n_codequipo
								   AND par.n_codequipo2 = eq2.n_codequipo
								   and par.c_estado = 'NIN'
								   ORDER BY d_fecha");

		return $query;

	}

	public function list_partidos_finalizados()
	{

		$query = $this->db->query("SELECT n_codpartido, n_codequipo1, n_codequipo2, eq1.c_equipo c_equipo1, eq2.c_equipo c_equipo2, eq1.c_bandera c_bandera1, eq2.c_bandera c_bandera2, n_goles1, n_goles2, d_fecha, c_estado, n_monto_apuesta 
								   FROM partidos par, equipos eq1, equipos eq2 
								   WHERE par.n_codequipo1 = eq1.n_codequipo 
								   AND par.n_codequipo2 = eq2.n_codequipo 
								   AND par.c_estado = 'FIN' 
								   ORDER BY d_fecha");

		return $query;

	}	

	public function list_partidos_apuestas_puntos($pn_coduser)
	{

		$query = $this->db->query("SELECT n_codpartido, n_codequipo1, n_codequipo2, eq1.c_equipo c_equipo1, eq2.c_equipo c_equipo2, eq1.c_bandera c_bandera1, eq2.c_bandera c_bandera2, n_goles1, n_goles2, d_fecha, c_estado, n_monto_apuesta, 
			(SELECT COUNT(*) FROM apuestas_partido ap WHERE n_coduser = ".$pn_coduser." AND n_codpartido = par.n_codpartido) n_apuestas
								   FROM partidos par, equipos eq1, equipos eq2
								   WHERE par.n_codequipo1 = eq1.n_codequipo
								   AND par.n_codequipo2 = eq2.n_codequipo
								   and par.c_estado = 'NIN'
								   ORDER BY d_fecha");

		return $query;

	}

}