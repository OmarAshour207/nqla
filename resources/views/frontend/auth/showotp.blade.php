@extends('frontend.layouts.app')

@push('frontend_styles')
    {{--    <style>--}}
    {{--        .nav-style-two .main-nav {--}}
    {{--            background: #3C0C70;--}}
    {{--        }--}}

    {{--        :root {--}}
    {{--            --color-white: #ffffff;--}}
    {{--            --color-light: #f1f5f9;--}}
    {{--            --color-black: #121212;--}}
    {{--            --color-night: #001632;--}}
    {{--            --color-red: #f44336;--}}
    {{--            --color-blue: #1a73e8;--}}
    {{--            --color-gray: #80868b;--}}
    {{--            --color-grayish: #dadce0;--}}
    {{--            --shadow-normal: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);--}}
    {{--            --shadow-medium: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);--}}
    {{--            --shadow-large: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);--}}
    {{--        }--}}

    {{--        a, button {--}}
    {{--            font-family: inherit;--}}
    {{--            font-size: inherit;--}}
    {{--            line-height: inherit;--}}
    {{--            cursor: pointer;--}}
    {{--            border: none;--}}
    {{--            outline: none;--}}
    {{--            background: none;--}}
    {{--            text-decoration: none;--}}
    {{--        }--}}

    {{--        img {--}}
    {{--            display: block;--}}
    {{--            width: 100%;--}}
    {{--            height: auto;--}}
    {{--            object-fit: cover;--}}
    {{--        }--}}

    {{--        .icofont-brand-google {--}}
    {{--            font-size: 1.65rem;--}}
    {{--            line-height: inherit;--}}
    {{--            margin-left: 0.5rem; /* Changed margin-right to margin-left */--}}
    {{--            color: var(--color-red);--}}
    {{--        }--}}

    {{--        .icofont-facebook {--}}
    {{--            font-size: 1.65rem;--}}
    {{--            line-height: inherit;--}}
    {{--            margin-left: 0.5rem; /* Changed margin-right to margin-left */--}}
    {{--            color: var(--color-blue);--}}
    {{--        }--}}

    {{--        .text {--}}
    {{--            font-family: inherit;--}}
    {{--            line-height: inherit;--}}
    {{--            text-transform: unset;--}}
    {{--            text-rendering: optimizeLegibility;--}}
    {{--        }--}}

    {{--        .text-large {--}}
    {{--            font-size: 2rem;--}}
    {{--            font-weight: 600;--}}
    {{--            color: var(--color-black);--}}
    {{--        }--}}

    {{--        .text-normal {--}}
    {{--            font-size: 1rem;--}}
    {{--            font-weight: 400;--}}
    {{--            color: var(--color-black);--}}
    {{--        }--}}

    {{--        .text-links {--}}
    {{--            font-size: 1rem;--}}
    {{--            font-weight: 400;--}}
    {{--            color: var(--color-blue);--}}
    {{--        }--}}

    {{--        .text-links:hover {--}}
    {{--            text-decoration: underline;--}}
    {{--        }--}}

    {{--        .main {--}}
    {{--            padding-top: 100px;--}}
    {{--        }--}}

    {{--        .main .wrapper {--}}
    {{--            max-width: 28rem;--}}
    {{--            width: 100%;--}}
    {{--            margin: 2rem auto;--}}
    {{--            padding: 2rem 2.5rem;--}}
    {{--            border: none;--}}
    {{--            outline: none;--}}
    {{--            border-radius: 0.25rem;--}}
    {{--            color: var(--color-black);--}}
    {{--            background: var(--color-white);--}}
    {{--            box-shadow: var(--shadow-large);--}}
    {{--        }--}}

    {{--        .main .wrapper .form {--}}
    {{--            width: 100%;--}}
    {{--            height: auto;--}}
    {{--            margin-top: 2rem;--}}
    {{--        }--}}

    {{--        .main .wrapper .form .input-control {--}}
    {{--            display: flex;--}}
    {{--            flex-direction: row-reverse; /* Changed justify-content to row-reverse */--}}
    {{--            align-items: center;--}}
    {{--            justify-content: space-between;--}}
    {{--            margin-bottom: 1.25rem;--}}
    {{--        }--}}

    {{--        .main .wrapper .form .input-field {--}}
    {{--            font-family: inherit;--}}
    {{--            font-size: 1rem;--}}
    {{--            font-weight: 400;--}}
    {{--            line-height: inherit;--}}
    {{--            width: 100%;--}}
    {{--            height: auto;--}}
    {{--            padding: 0.75rem 1.25rem;--}}
    {{--            border: none;--}}
    {{--            outline: none;--}}
    {{--            border-radius: 2rem;--}}
    {{--            color: var(--color-black);--}}
    {{--            background: var(--color-light);--}}
    {{--            text-transform: unset;--}}
    {{--            text-rendering: optimizeLegibility;--}}
    {{--            direction: rtl; /* Added RTL direction */--}}
    {{--        }--}}

    {{--        .main .wrapper .form .input-submit {--}}
    {{--            font-family: inherit;--}}
    {{--            font-size: 1rem;--}}
    {{--            font-weight: 500;--}}
    {{--            line-height: inherit;--}}
    {{--            cursor: pointer;--}}
    {{--            min-width: 40%;--}}
    {{--            height: auto;--}}
    {{--            padding: 0.65rem 1.25rem;--}}
    {{--            border: none;--}}
    {{--            outline: none;--}}
    {{--            border-radius: 2rem;--}}
    {{--            color: var(--color-white);--}}
    {{--            background: #3C0C70;--}}
    {{--            box-shadow: var(--shadow-medium);--}}
    {{--            text-transform: capitalize;--}}
    {{--            text-rendering: optimizeLegibility;--}}
    {{--            direction: rtl; /* Added RTLdirection */--}}
    {{--        }--}}

    {{--        .main .wrapper .striped {--}}
    {{--            display: flex;--}}
    {{--            flex-direction: row-reverse; /* Changed flex-direction to row-reverse */--}}
    {{--            justify-content: center;--}}
    {{--            align-items: center;--}}
    {{--            margin: 1rem 0;--}}
    {{--        }--}}

    {{--        .main .wrapper .striped-line {--}}
    {{--            flex: auto;--}}
    {{--            flex-basis: auto;--}}
    {{--            border: none;--}}
    {{--            outline: none;--}}
    {{--            height: 2px;--}}
    {{--            background: var(--color-grayish);--}}
    {{--        }--}}

    {{--        .main .wrapper .striped-text {--}}
    {{--            font-family: inherit;--}}
    {{--            font-size: 1rem;--}}
    {{--            font-weight: 500;--}}
    {{--            line-height: inherit;--}}
    {{--            color: var(--color-black);--}}
    {{--            margin: 0 1rem;--}}
    {{--        }--}}

    {{--        .main .wrapper .method-control {--}}
    {{--            margin-bottom: 1rem;--}}
    {{--        }--}}

    {{--        .main .wrapper .method-action {--}}
    {{--            font-family: inherit;--}}
    {{--            font-size: 0.95rem;--}}
    {{--            font-weight: 500;--}}
    {{--            line-height: inherit;--}}
    {{--            display: flex;--}}
    {{--            justify-content: center;--}}
    {{--            align-items: center;--}}
    {{--            width: 100%;--}}
    {{--            height: auto;--}}
    {{--            padding: 0.35rem 1.25rem;--}}
    {{--            outline: none;--}}
    {{--            border: 2px solid var(--color-grayish);--}}
    {{--            border-radius: 2rem;--}}
    {{--            color: var(--color-black);--}}
    {{--            background: var(--color-white);--}}
    {{--            text-transform: capitalize;--}}
    {{--            text-rendering: optimizeLegibility;--}}
    {{--            transition: all 0.35s ease;--}}
    {{--            direction: rtl; /* Added RTL direction */--}}
    {{--        }--}}

    {{--        .main .wrapper .method-action:hover {--}}

    {{--    </style>--}}
    <style>
        .nav-style-two .main-nav {
            background: #3C0C70;
        }
        :root {
            --color-white: #ffffff;
            --color-light: #f1f5f9;
            --color-black: #121212;
            --color-night: #001632;
            --color-red: #f44336;
            --color-blue: #1a73e8;
            --color-gray: #80868b;
            --color-grayish: #dadce0;
            --shadow-normal: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-large: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        a, button {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            text-decoration: none;
        }
        img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .icofont-brand-google {
            font-size: 1.65rem;
            line-height: inherit;
            margin-right: 0.5rem;
            color: var(--color-red);
        }
        .icofont-facebook {
            font-size: 1.65rem;
            line-height: inherit;
            margin-right: 0.5rem;
            color: var(--color-blue);
        }
        .text {
            font-family: inherit;
            line-height: inherit;
            text-transform: unset;
            text-rendering: optimizeLegibility;
        }
        .text-large {
            font-size: 2rem;
            font-weight: 600;
            color: var(--color-black);
        }
        .text-normal {
            font-size: 1rem;
            font-weight: 400;
            color: var(--color-black);
        }
        .text-links {
            font-size: 1rem;
            font-weight: 400;
            color: var(--color-blue);
        }
        .text-links:hover {
            text-decoration: underline;
        }
        .main {
            padding-top: 100px;
        }
        .main .wrapper {
            max-width: 28rem;
            width: 100%;
            margin: 2rem auto;
            padding: 2rem 2.5rem;
            border: none;
            outline: none;
            border-radius: 0.25rem;
            color: var(--color-black);
            background: var(--color-white);
            box-shadow: var(--shadow-large);
        }
        .main .wrapper .form {
            width: 100%;
            height: auto;
            margin-top: 2rem;
        }
        .main .wrapper .form .input-control {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }
        .main .wrapper .form .input-field {
            font-family: inherit;
            font-size: 1rem;
            font-weight: 400;
            line-height: inherit;
            width: 100%;
            height: auto;
            padding: 0.75rem 1.25rem;
            border: none;
            outline: none;
            border-radius: 2rem;
            color: var(--color-black);
            background: var(--color-light);
            text-transform: unset;
            text-rendering: optimizeLegibility;
        }
        .main .wrapper .form .input-submit {
            font-family: inherit;
            font-size: 1rem;
            font-weight: 500;
            line-height: inherit;
            cursor: pointer;
            min-width: 40%;
            height: auto;
            padding: 0.65rem 1.25rem;
            border: none;
            outline: none;
            border-radius: 2rem;
            color: var(--color-white);
            background: #3C0C70;
            box-shadow: var(--shadow-medium);
            text-transform: capitalize;
            text-rendering: optimizeLegibility;
        }
        .main .wrapper .striped {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin: 1rem 0;
        }
        .main .wrapper .striped-line {
            flex: auto;
            flex-basis: auto;
            border: none;
            outline: none;
            height: 2px;
            background: var(--color-grayish);
        }
        .main .wrapper .striped-text {
            font-family: inherit;
            font-size: 1rem;
            font-weight: 500;
            line-height: inherit;
            color: var(--color-black);
            margin: 0 1rem;
        }
        .main .wrapper .method-control {
            margin-bottom: 1rem;
        }
        .main .wrapper .method-action {
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 500;
            line-height: inherit;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            padding: 0.35rem 1.25rem;
            outline: none;
            border: 2px solid var(--color-grayish);
            border-radius: 2rem;
            color: var(--color-black);
            background: var(--color-white);
            text-transform: capitalize;
            text-rendering: optimizeLegibility;
            transition: all 0.35s ease;
        }
        .main .wrapper .method-action:hover {
            background: var(--color-light);
        }

        #preloder {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999999;
            /* background: #000; */
            background: rgba(255, 255, 255, 0.5);
        }

        .loader {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -20px;
            margin-left: -20px;
            border-radius: 60px;
            animation: loader 0.8s linear infinite;
            -webkit-animation: loader 0.8s linear infinite;
        }

        @keyframes loader {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
                border: 4px solid #056d4d;
                /* border: 4px solid #f44336; */
                border-left-color: transparent;
            }
            50% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
                border: 4px solid #056d4d;
                /* border: 4px solid #673ab7; */
                border-left-color: transparent;
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
                border: 4px solid #056d4d;
                border-left-color: transparent;
            }
        }

        @-webkit-keyframes loader {
            0% {
                -webkit-transform: rotate(0deg);
                border: 4px solid #056d4d;
                border-left-color: transparent;
            }
            50% {
                -webkit-transform: rotate(180deg);
                border: 4px solid #056d4d;
                border-left-color: transparent;
            }
            100% {
                -webkit-transform: rotate(360deg);
                border: 4px solid #056d4d;
                border-left-color: transparent;
            }
        }
    </style>
@endpush

@section('content')

    <main class="main">
        <div class="container">
            @include('frontend.auth.otp')
        </div>
    </main>

@endsection
