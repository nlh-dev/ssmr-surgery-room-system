<?php

use app\controllers\patientsController;

$patients = new patientsController();
$showPatientsYearType = $patients->getPatientYearTypeController();
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

            <input type="hidden" name="patientsModule" id="patientsModule" value="updatePatients">
            <input type="hidden" name="patient_ID" id="patient_ID" value="<?= $patientsData['patient_ID'] ?>">

            <div class="mb-4 flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-gray-800 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-strong text-xl font-bold text-gray-800">Información de Paciente</h1>
                </div>
                <?php require_once "./app/views/components/buttons/returnButton.php"; ?>
            </div>

            <div class="grid mb-6 grid-cols-6 gap-5">
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nombre del Paciente</label>
                    <div class="relative my-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="patientFullName" name="patientFullName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Inserte Nombre Completo...." value="<?= $patientsData['patient_fullName'] ?>">
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Edad del Paciente</label>
                    <div class="relative my-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="number" id="patientYearsOld" name="patientYearsOld" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Inserte edad...." value="<?= $patientsData['patient_yearsOld'] ?>">
                    </div>
                </div>

                <div class="">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Años / Meses</label>
                    <select id="patientYearType" name="patientYearType" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option selected value="">Seleccione....</option>
                        <?php foreach ($showPatientsYearType as $key => $showPatientsYearTypeValue) { ?>
                            <option value="<?= $showPatientsYearTypeValue['yearType_ID'] ?>"
                                <?= ($patientsData['patient_yearType_ID'] == $showPatientsYearTypeValue['yearType_ID']) ? 'selected' : '' ?>>
                                <?= $showPatientsYearTypeValue['yearType_Name'] ?></option>
                        <?php } ?>
                    </select>
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
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Número de Sala</label>
                    <div class="relative my-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10.83 5a3.001 3.001 0 0 0-5.66 0H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17ZM4 11h9.17a3.001 3.001 0 0 1 5.66 0H20a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H4a1 1 0 1 1 0-2Zm1.17 6H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17a3.001 3.001 0 0 0-5.66 0Z" />
                            </svg>
                        </div>
                        <input type="number" id="surgeryRoomNumber" name="surgeryRoomNumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Inserte...." value="<?= $patientsData['patient_surgeryRoom'] ?>">
                    </div>
                </div>
                
                <div>
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
                </div>
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