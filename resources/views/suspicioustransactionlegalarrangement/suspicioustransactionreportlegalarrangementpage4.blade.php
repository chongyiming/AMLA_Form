<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <x-shared-form-6
        :form_id="$form_id ?? null"
        :state="$state"
        :form="$form"
        :form1="$form1"
        :row="$row ?? null"
        :branch="$branch"
        :choices="$choices"
        :reported="$reported"
        :source="$source"
        :offence="$offence"
        :title="$title"
        :genders="$genders"
        :occupation="$occupation"
        :sector="$sector"
        :marital="$marital"
        :bankAccount="$bankAccount"
        :productType="$productType"
        :currency="$currency"
        :relationship="$relationship"
        :nationality="$nationality"
        :states="$states"
        :nationalityWithCode="$nationalityWithCode"
        :riskRating="$riskRating"
        :annualIncome="$annualIncome"
        formNo="Form_STR-DPMS-LA"
        headerKey="messages.str_settlor_protector_beneficiary_header"></x-shared-form-6>
</body>

</html>