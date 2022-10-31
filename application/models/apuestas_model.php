<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Apuestas_model extends CI_Model
{

	public function seqapuesta($pn_codpartido, $pn_coduser)
	{

		$query = $this->db->query("SELECT IFNULL(MAX(n_seqapuesta),0) + 1 count 
						   		   FROM apuestas_partido
								   WHERE n_codpartido = ".$pn_codpartido."
								   AND n_coduser = ".$pn_coduser);

		$res = $query->row();

		return $res;

	} 

	public function add_apuesta($data)
	{

		$resseq = $this->apuestas_model->seqapuesta($data['n_codpartido'],$data['n_coduser']);

/*

		$this->db->query("INSERT INTO apuestas_partido (n_codpartido, n_coduser, n_seqapuesta, n_goles1, n_goles2) 
						  VALUES (".$data['n_codpartido'].",".$data['n_coduser'].",".$resseq->count.",".$data['n_goles1'].",".$data['n_goles2'].")");

		$this->db->query("UPDATE usuarios 
						  SET n_saldo = n_saldo - 10 
						  WHERE n_coduser = ".$data['n_coduser']);

		$this->db->query("UPDATE partidos 
						  SET n_monto_apuesta = n_monto_apuesta + 10
						  WHERE n_codpartido = ".$data['n_codpartido']);

*/

		$this->db->query("INSERT INTO apuestas_partido (n_codpartido, n_coduser, n_seqapuesta, n_goles1, n_goles2) 
						  VALUES (".$data['n_codpartido'].",".$data['n_coduser'].",".$resseq->count.",".$data['n_goles1'].",".$data['n_goles2'].")");


		$respartido = $this->partidos_model->get_partido($data['n_codpartido']);

		if ($data['n_goles1'] - $data['n_goles2'] > 0)
		{

			$this->db->query("UPDATE apuestas_partido 
						  SET n_resultado = ".$respartido->n_codequipo1."
						  WHERE n_codpartido = ".$data['n_codpartido']." 
						  AND n_seqapuesta = ".$resseq->count); 

		}
		elseif ($data['n_goles1'] - $data['n_goles2'] < 0)
		{

			$this->db->query("UPDATE apuestas_partido 
						  SET n_resultado = ".$respartido->n_codequipo2."
						  WHERE n_codpartido = ".$data['n_codpartido']." 
						  AND n_seqapuesta = ".$resseq->count);

		}
		elseif ($data['n_goles1'] - $data['n_goles2'] == 0)
		{

			$this->db->query("UPDATE apuestas_partido 
						  SET n_resultado = 0
						  WHERE n_codpartido = ".$data['n_codpartido']." 
						  AND n_seqapuesta = ".$resseq->count);

		}


	}

	public function list_apuestas_partido($pn_codpartido, $pn_coduser)
	{


		$query = $this->db->query("SELECT apu.n_codpartido, apu.n_coduser, apu.n_seqapuesta, apu.n_goles1, apu.n_goles2, eq1.c_equipo c_equipo1, eq2.c_equipo c_equipo2
								   FROM apuestas_partido apu, partidos par, equipos eq1, equipos eq2 
								   WHERE apu.n_codpartido = ".$pn_codpartido."
								   AND apu.n_coduser = ".$pn_coduser."
								   AND apu.n_codpartido = par.n_codpartido
								   AND par.n_codequipo1 = eq1.n_codequipo
								   AND par.n_codequipo2 = eq2.n_codequipo
								   ORDER BY apu.n_seqapuesta  ");

		return $query;


	}

	public function update_apuesta($data)
	{

		$this->db->query("UPDATE apuestas_partido 
						  SET n_goles1 = ".$data['n_goles1'].",
						  n_goles2 = ".$data['n_goles2']."
						  WHERE n_codpartido = ".$data['n_codpartido']."
						  AND n_coduser = ".$data['n_coduser']."
						  AND n_seqapuesta = ".$data['n_seqapuesta']);

	}

	public function delete_apuesta($data)
	{

		$this->db->query("DELETE FROM apuestas_partido 
						  WHERE n_codpartido = ".$data['n_codpartido']."  
						  AND n_coduser = ".$data['n_coduser']."
						  AND n_seqapuesta = ".$data['n_seqapuesta']);

/*

		$this->db->query("UPDATE usuarios 
						  SET n_saldo = n_saldo + 10 
						  WHERE n_coduser = ".$data['n_coduser']);

		$this->db->query("UPDATE partidos
						  SET n_monto_apuesta =  n_monto_apuesta - 10
						  WHERE n_codpartido = ".$data['n_codpartido']);

*/

	}

	public function list_ganadores()
	{

		$query = $this->db->query("SELECT par.n_codpartido, par.n_goles1, par.n_goles2, eq1.c_equipo c_equipo1, eq2.c_equipo c_equipo2 
								   FROM partidos par, equipos eq1, equipos eq2
								   WHERE par.c_estado = 'FIN'
								   AND par.n_codequipo1 = eq1.n_codequipo 
								   AND par.n_codequipo2 = eq2.n_codequipo
								   AND exists (SELECT 1 FROM partidos pa1, apuestas_partido apu
								    		   WHERE pa1.n_codpartido = par.n_codpartido
            								   AND pa1.n_codpartido = apu.n_codpartido
											   AND apu.n_goles1 = par.n_goles1
											   AND apu.n_goles2 = par.n_goles2)");

		return $query;

	}

	public function list_ganadores_partido($n_codpartido)
	{

		$query = $this->db->query("SELECT par.n_codpartido, apu.n_coduser, CONCAT(c_nombres,' ',c_apellido_p,' ',c_apellido_m) c_nombre
								   FROM partidos par, apuestas_partido apu, usuarios usu
								   WHERE par.c_estado = 'FIN'
                                   AND par.n_codpartido = ".$n_codpartido." 
                                   AND par.n_codpartido = apu.n_codpartido
                                   AND apu.n_coduser = usu.n_coduser
								   AND EXISTS (SELECT 1 FROM partidos pa1, apuestas_partido ap1
								    		   WHERE pa1.n_codpartido = par.n_codpartido
            								   AND pa1.n_codpartido = ap1.n_codpartido
											   AND apu.n_goles1 = par.n_goles1
											   AND apu.n_goles2 = par.n_goles2)");

		return $query;

	}

}