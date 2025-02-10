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

        $checkPatients = $this->dbRequestExecute("SELECT * FROM patients
            WHERE patient_isDischarged = 0");
        if ($checkPatients->rowCount() >= 1) {
            $alert = [
                "type" => "simple",
                "icon" => "warning",
                "title" => "¡Error al Añadir Paciente!",
                "text" => "¡Este paciente ya fue registrado!",
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
                "type" => "clean",
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
}
