<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Meta description goes here.">
    <meta name="author" content="Mahmoud El Helou">
    <title>Home | JOBSLDN</title>

    <!-- Styles-->
    <link rel="stylesheet" href="{{asset('assets/dist/styles.css')}}">
</head>
<style>
    .ayaTst {
        color: {{\App\Models\Setting::query()->first()->main_color}};
        border-color: {{\App\Models\Setting::query()->first()->main_color}};
    }

    .ayaTst:hover {
        background-color: {{\App\Models\Setting::query()->first()->main_color}};
        color: whitesmoke;
        border-color: {{\App\Models\Setting::query()->first()->main_color}};
    }

    .primary-button:hover {
        background-color: {{\App\Models\Setting::query()->first()->main_color}};
        color: whitesmoke;
        border-color: {{\App\Models\Setting::query()->first()->main_color}};
    }

    .slider .owl-carousel .owl-dots .owl-dot.active span{
        background-color: {{\App\Models\Setting::query()->first()->main_color}};
    }

    .slider .owl-carousel .owl-dots .owl-dot:hover span{
        background-color: {{\App\Models\Setting::query()->first()->secondary_color}};
    }
    @media (max-width: 1600px) {
        .primary-button {
            background-color: {{\App\Models\Setting::query()->first()->main_color}};
            color: whitesmoke;
            border-color: {{\App\Models\Setting::query()->first()->main_color}};
            width: 33%;
        }
    }

    @media (max-width: 640px) {
        .primary-button {
            background-color: {{\App\Models\Setting::query()->first()->main_color}};
            color: whitesmoke;
            border-color: {{\App\Models\Setting::query()->first()->main_color}};
            width: 50%;
        }
    }
    .navbar{
       border-bottom: 1px solid #b4b4b4;
    }

    .select2-container{
        background-color: {{\App\Models\Setting::query()->first()->main_color}} !important;
    }

    .select2 {
        width: 100% !important;
        border: 1px solid {{\App\Models\Setting::query()->first()->main_color}};
        height: 55px;
    }
    .select2-selection__rendered{
        color: {{\App\Models\Setting::query()->first()->main_color}} !important;
    }
    .featured-jobs__job-title{
        font-size: 1rem;
    }
    .main-color{
        color: {{\App\Models\Setting::query()->first()->main_color}} !important;
    }
    .main-color-sm{
        color: {{\App\Models\Setting::query()->first()->main_color}} !important;
        font-size: .75rem;
    }
    .period{
        font-size: .75rem;
    }
    .featured-jobs__job-info div .period{
        margin-top: -.5rem;
        text-align: center;
    }
    .featured-jobs__job{
        border-color: {{\App\Models\Setting::query()->first()->main_color}};
    }
    .btn-primary-ldn {
        background-color: {{\App\Models\Setting::query()->first()->main_color}};
        color: whitesmoke;
        border-color: {{\App\Models\Setting::query()->first()->main_color}};
    }
    .featured-jobs__job:hover{
        border: none;
        background-color: {{\App\Models\Setting::query()->first()->secondary_color}};
        color: {{\App\Models\Setting::query()->first()->secondary_color}};
    }
    .btn:hover{
        color: whitesmoke;
    }

    .featured-jobs__job:hover+.featured-jobs__job-action{
        border: none;
        background-color: {{\App\Models\Setting::query()->first()->secondary_color}};
    }
    .all-jobs{
        background-color: {{\App\Models\Setting::query()->first()->secondary_color}};
        color: {{\App\Models\Setting::query()->first()->main_color}};
    }
    .all-jobs:hover{
        color: {{\App\Models\Setting::query()->first()->main_color}};
    }
    .form-control-lg, textarea.form-control{
        border-color: {{\App\Models\Setting::query()->first()->main_color}} !important;
    }
    .jobs__item-details-meta-item{
        margin-right: 1.5rem;
    }
    .jobs__item{
        border-color: {{\App\Models\Setting::query()->first()->main_color}} !important;
    }

</style>