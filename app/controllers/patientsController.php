<?php

namespace app\controllers;

use app\models\mainModel;

class patientsController extends mainModel
{

    public function getPatientStatesController(){
        $getPatientStates_Query = "SELECT * FROM patient_states";
        $getPatientStates_SQL = $this->dbRequestExecute($getPatientStates_Query);
        $getPatientStates_SQL->execute();
        return $getPatientStates_SQL;
    }

    public function getDoctorsController(){
        $getDoctors_Query = "SELECT * FROM doctors ORDER BY doctor_firstName ASC";
        $getDoctors_SQL = $this->dbRequestExecute($getDoctors_Query);
        $getDoctors_SQL->execute();
        return $getDoctors_SQL;
    }

    public function getDiagnosisController(){
        $getDiagnosis_Query = "SELECT * FROM diagnosis ORDER BY diagnosis_TypeName ASC";
        $getDiagnosis_SQL = $this->dbRequestExecute($getDiagnosis_Query);
        $getDiagnosis_SQL->execute();
        return $getDiagnosis_SQL;
    }

    public function addPatientsController(){
        $patientFullName = strtoupper($this->cleanRequest($_POST['patientFullName']));
        $patientYearsOld = $this->cleanRequest($_POST['patientYearsOld']);
        $surgeryDate = $this->cleanRequest($_POST['surgeryDate']);
        $surgeryTime = $this->cleanRequest($_POST['surgeryTime']);
        $surgeryDoctor = $this->cleanRequest($_POST['surgeryDoctor']);
        $surgeryDiagnosis = $this->cleanRequest($_POST['surgeryDiagnosis']);
        $surgeryRoomNumber = $this->cleanRequest($_POST['surgeryRoomNumber']);
        $patientState = $this->cleanRequest($_POST['patientState']);

        if (empty($patientFullName) || empty($patientYearsOld) || empty($surgeryTime) || empty($surgeryDate) || empty($surgeryDoctor) || empty($surgeryDiagnosis) || empty($surgeryRoomNumber) || empty($patientState)) {
            $alert = [
                "type" => "simple",
                "icon" => "warning",
                "title" => "¡Error al Añadir Paciente!",
                "text" => "¡Algunos campos se encuentran vacios!",
            ];
            return json_encode($alert);
            exit();
        }

        // ARRAY TO STORE DATA FROM FORM FIELD TO DATABASE
        $patientRegisterData = [
            [
                "db_FieldName" => "patient_fullName",
                "db_ValueName" => ":fullName",
                "db_realValue" => $patientFullName
            ],
            [
                "db_FieldName" => "patient_yearsOld",
                "db_ValueName" => ":yearsOld",
                "db_realValue" => $patientYearsOld
            ],
            [
                "db_FieldName" => "patient_sugeryDate",
                "db_ValueName" => ":sugeryDate",
                "db_realValue" => $surgeryDate
            ],
            [
                "db_FieldName" => "patient_surgeryTime",
                "db_ValueName" => ":surgeryTime",
                "db_realValue" => $surgeryTime
            ],
            [
                "db_FieldName" => "patient_surgeryRoom",
                "db_ValueName" => ":surgeryRoom",
                "db_realValue" => $surgeryRoomNumber
            ],
            [
                "db_FieldName" => "patient_doctor_ID",
                "db_ValueName" => ":doctorID",
                "db_realValue" => $surgeryDoctor
            ],
            [
                "db_FieldName" => "patient_diagnosis_ID",
                "db_ValueName" => ":diagnosisID",
                "db_realValue" => $surgeryDiagnosis
            ],
            [
                "db_FieldName" => "patient_surgeryState_ID",
                "db_ValueName" => ":surgeryStateID",
                "db_realValue" => $patientState
            ],
            [
                "db_FieldName" => "patient_isDischarged",
                "db_ValueName" => ":isDischarged",
                "db_realValue" => false
            ],
        ];

        $addPatients = $this->saveData("patients", $patientRegisterData);
        if ($addPatients->rowCount() >= 1) {
            $alert = [
                "type" => "reload",
                "icon" => "success",
                "title" => "¡Operación Realizada!",
                "text" => "¡Paciente registrado exitosamente!",
            ];
        } else {
            $alert = [
                "type" => "simple",
                "icon" => "error",
                "title" => "¡Error!",
                "text" => "¡Dispositivo no registrador, intente nuevamente!",
            ];
        }
        return json_encode($alert);
    }

    public function patientsListController($page, $register, $url, $search){

        $page = $this->cleanRequest($page);
        $register = $this->cleanRequest($register);

        $url = $this->cleanRequest($url);
        $url = APPURL . $url . "/";

        $search = $this->cleanRequest($search);
        $table = "";

        $page = (isset($page) && $page > 0) ? (int) $page : 1;
        $start = ($page > 0) ? (($page * $register) - $register) : 0;

        $dataRequest_Query = "SELECT * FROM patients
        JOIN doctors ON patients.patient_doctor_ID = doctors.doctor_ID
        JOIN diagnosis ON patients.patient_diagnosis_ID = diagnosis.diagnosis_ID
        JOIN patient_states ON patients.patient_surgeryState_ID = patient_states.patientsState_ID
        WHERE (patient_fullName LIKE '%$search%'
        OR patient_yearsOld LIKE '%$search%'
        OR patient_sugeryDate LIKE '%$search%'
        OR patient_surgeryTime LIKE '%$search%'
        OR patient_surgeryRoom LIKE '%$search%'
        OR patient_doctor_ID LIKE '%$search%'
        OR patient_diagnosis_ID LIKE '%$search%'
        OR patient_surgeryState_ID LIKE '%$search%')
        AND patient_isDischarged = 0
        ORDER BY patient_surgeryTime 
        DESC LIMIT $start,$register";

        $totalData_Query = "SELECT COUNT(patient_ID) FROM patients
        JOIN doctors ON patients.patient_doctor_ID = doctors.doctor_ID
        JOIN diagnosis ON patients.patient_diagnosis_ID = diagnosis.diagnosis_ID
        JOIN patient_states ON patients.patient_surgeryState_ID = patient_states.patientsState_ID
        WHERE (patient_fullName LIKE '%$search%'
        OR patient_yearsOld LIKE '%$search%'
        OR patient_sugeryDate LIKE '%$search%'
        OR patient_surgeryTime LIKE '%$search%'
        OR patient_surgeryRoom LIKE '%$search%'
        OR patient_doctor_ID LIKE '%$search%'
        OR patient_diagnosis_ID LIKE '%$search%'
        OR patient_surgeryState_ID LIKE '%$search%')
        AND patient_isDischarged = 0";

        $data = $this->dbRequestExecute($dataRequest_Query);
        $data = $data->fetchAll();

        $total = $this->dbRequestExecute($totalData_Query);
        $total = (int) $total->fetchColumn();

        $numPages = ceil($total / $register);

        $table  .= '
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4">
            <table class="w-full text-sm text-left text-white">
                <thead class="text-xs text-white text-center uppercase bg-gray-900">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre del Paciente</th>
                        <th scope="col" class="px-6 py-3">Edad</th>
                        <th scope="col" class="px-6 py-3">Fecha y Hora de Cirugía</th>
                        <th scope="col" class="px-6 py-3">Sala</th>
                        <th scope="col" class="px-6 py-3">Médico</th>
                        <th scope="col" class="px-6 py-3">Diagnostico</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3 sr-only">Opciones</th>
                    </tr>
                </thead>
                <tbody>';
        if ($total >= 1 && $page <= $numPages) {
            $counter = $start + 1;
            $startPage = $start + 1;
            foreach ($data as $rows) {
                $table .= '
                        <tr class="bg-white border-b text-gray-900 border-gray-200 text-center">
                        <th class="px-6 py-4 font-medium whitespace-nowrap">'.$rows['patient_fullName'].'</th>
                        <td class="px-6 py-4">'.$rows['patient_yearsOld'].' Años</td>
                        <td class="px-6 py-4">'.$rows['patient_sugeryDate'].' - '.$rows['patient_surgeryTime'].'</td>
                        <td class="px-6 py-4">#'.$rows['patient_surgeryRoom'].'</td>
                        <td class="px-6 py-4">'.$rows['doctor_firstName'].' '.$rows['doctor_lastName'].'</td>
                        <td class="px-6 py-4">'.$rows['diagnosis_TypeName'].'</td>
                        <td class="px-6 py-4">
                        <span class="bg-yellow-500 text-gray-900 text-xs font-bold me-2 px-2.5 py-0.5 rounded-sm">
                            '.$rows['patientsState_Name'].'
                        </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                <a class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <button class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                                    </svg>

                                </button>
                            </div>
                        </td>
                    </tr>';
                    $counter++;
            }
            $finalPage = $counter - 1;
        } else {
            if ($total >= 1) {
                $table .= '
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-200" >
                        <td colspan="6">
                        <div class= "flex justify-center items-center my-4">
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
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-200">
                        <td colspan="6">
                        <div class= "flex justify-center items-center my-4">
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
}
