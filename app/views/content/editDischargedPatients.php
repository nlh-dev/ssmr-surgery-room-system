<?php

use app\controllers\patientsController;

$patients = new patientsController();
$showPatientStates = $patients->getPatientStatesController();
$showDiagnosis = $patients->getDiagnosisController();
$showDoctors = $patients->getDoctorsController();

$patientsID = $instacePatients->cleanRequest($url[1]);
$patientsData = $instacePatients->selectData("Unique", "patients", "patient_ID", $patientsID);
?>

<div class="p-4">
    <div class="p-4 mt-14">
        <!-- BREADCRUM -->
        <?php require_once "./app/views/components/breadcrumbs/editPatientsBreadcrumb.php"; ?>
        <hr class="my-4 text-gray-300">


        <?php if ($patientsData->rowCount() == 1) {
            $patientsData = $patientsData->fetch();
        } ?>
        <!-- ADD PATIENTS FORM -->
        <form action="<?= APPURL ?>app/ajax/patientsAjax.php" class="AjaxForm" method="POST">

            <input type="hidden" name="patientsModule" id="patientsModule" value="updateDischargedPatients">
            <input type="hidden" name="patient_ID" id="patient_ID" value="<?= $patientsData['patient_ID'] ?>">

            <div class="grid mb-6 grid-cols-6 gap-5">
                <div class="col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nombre del Paciente</label>
                    <div class="relative my-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="text" id="patientFullName" name="patientFullName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Inserte Nombre Completo...." value="<?= $patientsData['patient_fullName'] ?>">
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Edad del Paciente</label>
                    <div class="relative my-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="number" id="patientYearsOld" name="patientYearsOld" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Inserte edad...." value="<?= $patientsData['patient_yearsOld'] ?>">
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Fecha de Cirugía</label>
                    <div class="relative my-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="surgeryDate" name="surgeryDate" datepicker datepicker-buttons datepicker-autoselect-today datepicker-autohide datepicker-format="dd/mm/yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Seleccione Fecha...."
                            value="<?= $patientsData['patient_sugeryDate'] ?>" />
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Hora de Cirugía</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="time" id="surgeryTime" name="surgeryTime" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $patientsData['patient_surgeryTime'] ?>" />
                    </div>
                </div>

                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Doctor a cargo de Cirugía</label>
                    <select id="surgeryDoctor" name="surgeryDoctor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Seleccione....</option>
                        <?php foreach ($showDoctors as $key => $showDoctorsValue) { ?>
                            <option value="<?= $showDoctorsValue['doctor_ID'] ?>"
                                <?= ($patientsData['patient_doctor_ID'] == $showDoctorsValue['doctor_ID']) ? 'selected' : '' ?>>
                                <?= $showDoctorsValue['doctor_firstName'] ?> <?= $showDoctorsValue['doctor_lastName'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Diagnóstico del Paciente</label>
                    <select id="surgeryDiagnosis" name="surgeryDiagnosis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Seleccione....</option>
                        <?php foreach ($showDiagnosis as $key => $showDiagnosisValue) { ?>
                            <option value="<?= $showDiagnosisValue['diagnosis_ID'] ?>"
                                <?= ($patientsData['patient_diagnosis_ID'] == $showDiagnosisValue['diagnosis_ID']) ? 'selected' : '' ?>>
                                <?= $showDiagnosisValue['diagnosis_TypeName'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Número de Sala</label>
                    <div class="relative my-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="number" id="surgeryRoomNumber" name="surgeryRoomNumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Inserte...." value="<?= $patientsData['patient_surgeryRoom'] ?>">
                    </div>
                </div>
                
                <!-- <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Estado del Paciente</label>
                    <select id="patientState" name="patientState" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <?php foreach ($showPatientStates as $key => $patientStatesValue) { ?>
                            <?php if ($patientStatesValue['patientsState_ID'] != 4) { ?>
                                <option value="<?= $patientStatesValue['patientsState_ID'] ?>"
                                    <?= ($patientsData['patient_surgeryState_ID'] == $patientStatesValue['patientsState_ID']) ? 'selected' : '' ?>>
                                    <?= $patientStatesValue['patientsState_Name'] ?>
                                </option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div> -->
            </div>
            <div class="w-full flex items-center justify-end">
                <?php require_once "./app/views/components/buttons/cancelButton.php"; ?>
                <button type="submit" class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-100">
                    <svg class="w-5 h-5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>