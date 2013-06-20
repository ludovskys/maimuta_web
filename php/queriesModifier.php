<?php
include('../connect.php');
$conn = connect();

$resultat = "";
if (isset($_POST['id'])) {
	$type = $_POST['type'];
	$id = $_POST['id'];
	if ($type == 'palier') {
		$res = $conn->execute("SELECT l.id_session, s.nom_session FROM CPS_Lien_Sessions_Paliers l, CPS_Sessions s WHERE l.id_palier=$id AND s.id_session=l.id_session");
		while (!$res->EOF) {
			$session_id = $res->Fields(0)->value;
			$nom = $res->Fields(1)->value;
			$res->MoveNext();
			$resultat .= "<option value='$session_id'>$nom</option>";
		}
	} elseif ($type == 'modifierPalier') {
		$values = explode(',',$_POST['values']);
		$conn->execute("DELETE FROM CPS_Lien_Sessions_Paliers WHERE id_palier=$id");
		foreach($values as $id_session) {
			$conn->execute("INSERT INTO CPS_Lien_Sessions_Paliers VALUES($id_session, $id)");
		}
	} elseif ($type == 'batterie') {
		$res = $conn->execute("SELECT l.id_palier, p.nom_palier FROM CPS_Lien_Paliers_Batteries l, CPS_Paliers p WHERE id_batterie=$id AND p.id_palier=l.id_palier");
		while (!$res->EOF) {
			$palier_id = $res->Fields(0)->value;
			$nom = $res->Fields(1)->value;
			$res->MoveNext();
			$resultat .= "<option value='$palier_id'>$nom</option>";
		}
	} elseif ($type == 'modifierBatterie') {
		$values = explode(',',$_POST['values']);
		$conn->execute("DELETE FROM CPS_Lien_Paliers_Batteries WHERE id_batterie=$id");
		foreach($values as $palier_id) {
			$conn->execute("INSERT INTO CPS_Lien_Paliers_Batteries(id_palier, id_batterie) VALUES($palier_id, $id)");
		}
	}
}
echo $resultat;
?>