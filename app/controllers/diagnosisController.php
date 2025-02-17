<?php

namespace app\controllers;

use app\models\mainModel;

class diagnosisController extends mainModel
{
    public function addDiagnosisController(){

        $diagnosisTypeName = strtoupper($this->cleanRequest($_POST['diagnosisTypeName']));
        if (empty($diagnosisTypeName)) {
            $alert = [
                "type" => "simple",
                "icon" => "warning",
                "title" => "¡Error al Añadir Diagnostico!",
                "text" => "El Campo se enceuntra vacio"
            ];
            return json_encode($alert);
            exit();
        }

        $checkDiagnosis_Query = "SELECT * FROM diagnosis WHERE diagnosis_TypeName = '$diagnosisTypeName'";
        $checkDiagnosis_SQL = $this->dbRequestExecute($checkDiagnosis_Query);
        if ($checkDiagnosis_SQL->rowCount() > 0) {
            $alert = [
                "type" => "simple",
                "icon" => "warning",
                "title" => "¡Error al Añadir Diagnostico!",
                "text" => "¡El Diagnostico " . $diagnosisTypeName . " ya se encuentra registrado!"
            ];
            return json_encode($alert);
            exit();
        }

        $diagnosisRegisterData = [
            [
                "db_FieldName" => "diagnosis_TypeName",
                "db_ValueName" => ":diagnosisTypeName",
                "db_realValue" => $diagnosisTypeName
            ],
            [
                "db_FieldName" => "diagnosis_creationDateTime",
                "db_ValueName" => ":creationDateTime",
                "db_realValue" => date('Y-m-d H:i:s')
            ]];
        $addDiagnosis = $this->saveData("diagnosis", $diagnosisRegisterData);
        if ($addDiagnosis->rowCount() >= 1) {
            $alert = [
                "type" => "reload",
                "icon" => "success",
                "title" => "¡Operación Realizada!",
                "text" => "¡Diagnóstico " .$diagnosisTypeName. " añadido Exitosamente!"
            ];
        }
        return json_encode($alert);
    }

    public function diagnosisListController($page, $register, $url, $search){

        $page = $this->cleanRequest($page);
        $register = $this->cleanRequest($register);

        $url = $this->cleanRequest($url);
        $url = APPURL . $url . "/";

        $search = $this->cleanRequest($search);
        $table = "";

        $page = (isset($page) && $page > 0) ? (int) $page : 1;
        $start = ($page > 0) ? (($page * $register) - $register) : 0;

        $dataRequest_Query = "SELECT * FROM diagnosis
            WHERE diagnosis_TypeName LIKE '%$search%'
            OR diagnosis_creationDateTime LIKE '%$search%'
            ORDER BY diagnosis_creationDateTime
            DESC LIMIT $start,$register";

        $totalData_Query = "SELECT COUNT(diagnosis_ID) FROM diagnosis
            WHERE diagnosis_TypeName LIKE '%$search%'
            OR diagnosis_creationDateTime LIKE '%$search%'";

        $data = $this->dbRequestExecute($dataRequest_Query);
        $data = $data->fetchAll();

        $total = $this->dbRequestExecute($totalData_Query);
        $total = (int) $total->fetchColumn();

        $numPages = ceil($total / $register);

        $table  .= '
            <div class="relative overflow-x-hidden shadow-md sm:rounded-lg my-4">
                <table class="w-full text-sm text-left text-white">
                    <thead class="text-xs text-white text-center bg-gray-900">
                        <tr>
                            <th scope="col" class="px-6 py-3 uppercase">#</th>
                            <th scope="col" class="px-6 py-3 uppercase">Nombre del Diagnostico</th>
                            <th scope="col" class="px-6 py-3 uppercase">Fecha y Hora de Creación</th>';
        if ($total >= 1) {
            $table .= '<th scope="col" class="px-6 py-3 sr-only">Opciones</th>';
        }
        $table .= '</tr>
                    </thead>
                    <tbody>';
        if ($total >= 1 && $page <= $numPages) {
            $counter = $start + 1;
            $startPage = $start + 1;
            foreach ($data as $rows) {
                $table .= '
                        <tr class="bg-white border-b text-gray-900 border-gray-200 text-center hover:bg-gray-200 transition duration-100">
                            <td class="text-gray-500">'.$counter.'</td>
                            <td class="px-6 py-4 font-bold whitespace-nowrap uppercase">
                                ' . $rows['diagnosis_TypeName'] . '
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium uppercase">
                            ' . date('d/m/Y - h:i A', strtotime($rows['diagnosis_creationDateTime'])) . '
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-center">
                                    <a href="'.APPURL.'editDiagnosis/'.$rows['diagnosis_ID'].'" class="editButton text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 transition duration-100">
                                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
                                            <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <form class="AjaxForm" action="' . APPURL . 'app/ajax/diagnosisAjax.php" method="POST">
                                    <input type="hidden" name="diagnosisModule" value="deleteDiagnosis">
                                    <input type="hidden" name="diagnosis_ID" value="' . $rows['diagnosis_ID'] . '">
                                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 transition duration-100">
                                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>';
                $counter++;
            }
            $finalPage = $counter - 1;
        } else {
            if ($total >= 1) {
                $table .= '
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-200 transition duration-100 text-center">
                            <td class="" colspan="7">
                            <div class= "flex justify-center items-center my-4 text-gray-500">
                                No se encontraron registros en esta pagina
                            </div>
                            <div class= "flex justify-center items-center my-4">
                                <a href="' . $url . '1/" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                    Haz click aqui para recargar
                                </a>
                            </div>
                            </td>
                        </tr>
                    ';
            } else {
                $table .= '
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-200 transition duration-100">
                            <td colspan="7">
                            <div class= "flex justify-center items-center my-4 text-gray-600">
                                No se encontraron registros
                            </div>
                            </td>
                        </tr>
                    ';
            }
        }
        $table .= '
                    </tbody>
                </table>
            </div>
            ';
        if ($total > 0 && $page <= $numPages) {
            $table .= '<div class="flex justify-end items-center">
                             <p class="has-text-right">
                                    Mostrando de <strong>' . $startPage . '</strong> a <strong>' .  $finalPage . ' </strong> de un total de <strong> ' . $total . '</strong> registros
                                </p>
                            </div>';
            $table .= $this->paginationData($page, $numPages, $url, 1);
            
        }

        return $table;
    }

    public function deleteDiagnosisController() {
        $diagnosisID = $this->cleanRequest($_POST['diagnosis_ID']);

        $checkDeleteDiagnosis_Query = "SELECT * FROM  patients WHERE patient_diagnosis_ID = '$diagnosisID'";
        $checkDeleteDiagnosis_SQL = $this -> dbRequestExecute($checkDeleteDiagnosis_Query);
        if ($checkDeleteDiagnosis_SQL -> rowCount() > 0) {
            $alert = [
                "type" => "simple",
                "icon" => "warning",
                "title" => "¡Diagnostico no Eliminado!",
                "text" => "¡No pudes eliminar este diagnostico!"
            ];
            return json_encode($alert);
            exit();
        }

        $diagnosisData = $this->dbRequestExecute("SELECT * FROM diagnosis WHERE diagnosis_ID = '$diagnosisID'");
        if ($diagnosisData->rowCount() <= 0) {
            $alert = [
                "type" => "simple",
                "icon" => "error",
                "title" => "¡Error al eliminar Diagnostico!",
                "text" => "¡Diagnostico no Encontrado!"
            ];
            return json_encode($alert);
            exit();
        } else {
            $diagnosisData = $diagnosisData->fetch();
        }

        $deletePatient = $this->dbRequestExecute("DELETE FROM diagnosis WHERE diagnosis_ID = '$diagnosisID'");
        if ($deletePatient->rowCount() == 1) {
            $alert = [
                "type" => "reload",
                "icon" => "success",
                "title" => "¡Operación Realizada!",
                "text" => "Diagnostico eliminado exitosamente"
            ];
        } else {
            $alert = [
                "type" => "simple",
                "icon" => "error",
                "title" => "¡Error al eliminar Doctor!",
                "text" => "¡Doctor no eliminado, intente nuevamente!"
            ];
            return json_encode($alert);
            exit();
        }
        return json_encode($alert);
    }

    public function updateDiagnosisController(){
        $diagnosisID = $this -> cleanRequest($_POST['diagnosis_ID']);
        $diagnosisData = $this -> dbRequestExecute("SELECT * FROM diagnosis WHERE diagnosis_ID = '$diagnosisID'");

        if ($diagnosisData -> rowCount() <= 0) {
            $alert=[
                "type"=>"simple",
                "icon"=>"error",
                "title"=>"¡Error al Actualizar Médico!",
                "text"=>"Médico no encontrado",
            ];
            return json_encode($alert);
            exit();
        } else {
            $diagnosisData = $diagnosisData -> fetch();
        }

        $diagnosisTypeName = strtoupper($this->cleanRequest($_POST['diagnosisTypeName']));
        if (empty($diagnosisTypeName)) {
            $alert = [
                "type" => "simple",
                "icon" => "warning",
                "title" => "¡Error al Actualizar Diagnóstico!",
                "text" => "¡El campo se encuentran vacio!"
            ];
            return json_encode($alert);
            exit();
        }

        $diagnosisDataUpdate = [
            [
                "db_FieldName" => "diagnosis_TypeName",
                "db_ValueName" => ":diagnosisTypeName",
                "db_realValue" => $diagnosisTypeName
            ],
        ];

        $diagnosisCondition = [
            "condition_FieldName" => "diagnosis_ID",
            "condition_ValueName" => ":ID",
            "condition_realValue" => $diagnosisID
        ];

        if ($this -> updateData("diagnosis", $diagnosisDataUpdate, $diagnosisCondition)) {
            $alert=[
                "type"=>"reload",
                "icon"=>"success",
                "title"=>"¡Operacion Realizada!",
                "text"=>"Diagnostico actualizado exitosamente",
            ];
        }else{
            $alert=[
                "type"=>"simple",
                "icon"=>"error",
                "title"=>"¡Error!",
                "text"=>"Error al actualizar Diagnostico, intente nuevamente",
            ];
        }
        return json_encode($alert);

    }
}
