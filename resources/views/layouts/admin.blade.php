<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CMS Admin')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { font-family: 'Poppins', sans-serif !important; }

        body {
            background: #F0F4FA !important;
            color: #0F172A;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #F1F5F9; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #94A3B8; }

        /* Card lebih premium */
        .card {
            background: #fff !important;
            border: 1px solid #E8EFFE !important;
            border-radius: 18px !important;
            box-shadow: 0 2px 16px rgba(15,23,42,0.06) !important;
        }

        /* Sidebar premium */
        aside .rounded-xl {
            border-radius: 16px !important;
            border: 1px solid #E8EFFE !important;
            box-shadow: 0 2px 12px rgba(15,23,42,0.05) !important;
        }

        /* Button primary lebih smooth */
        .btn-primary {
            background: #1558A8 !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            letter-spacing: 0.01em !important;
            transition: all 0.2s !important;
        }
        .btn-primary:hover {
            background: #1A6CC4 !important;
            box-shadow: 0 4px 16px rgba(21,88,168,0.3) !important;
            transform: translateY(-1px) !important;
        }

        /* Field input */
        .field-input {
            border: 1.5px solid #E8EFFE !important;
            border-radius: 10px !important;
            background: #FAFBFF !important;
            transition: all 0.15s !important;
        }
        .field-input:focus {
            border-color: #1558A8 !important;
            background: #fff !important;
            box-shadow: 0 0 0 3px rgba(21,88,168,0.08) !important;
        }

        /* Sidebar active item */
        nav button[style*="bg-\[#0072BC\]"],
        nav button.bg-\[#0072BC\] {
            border-radius: 10px !important;
        }

        /* Item row */
        .item-row {
            border: 1px solid #E8EFFE !important;
            border-radius: 12px !important;
        }

        /* Badge */
        .badge {
            border-radius: 20px !important;
            font-size: 0.7rem !important;
        }

        /* Table head */
        thead tr {
            background: #F8FAFF !important;
        }
        th {
            color: #94A3B8 !important;
            font-weight: 600 !important;
            font-size: 0.7rem !important;
            letter-spacing: 0.06em !important;
        }

        /* Page header area */
        .max-w-7xl {
            padding-top: 2rem !important;
        }

        /* Add form box */
        .add-form-box {
            background: linear-gradient(135deg, #F8FAFF 0%, #EEF4FF 100%) !important;
            border: 1.5px solid #E8EFFE !important;
            border-radius: 14px !important;
        }

        /* Empty state */
        .empty-state {
            border: 1.5px dashed #E8EFFE !important;
            border-radius: 14px !important;
            background: #FAFBFF !important;
        }

        /* Step bubble */
        .step-bubble {
            background: #1558A8 !important;
        }

        /* Lomba nav card */
        .lomba-nav-card {
            border-radius: 14px !important;
            border: 1.5px solid #E8EFFE !important;
        }
        .lomba-nav-card:hover {
            border-color: #1558A8 !important;
            background: #F0F7FF !important;
        }
    </style>
</head>
<body class="antialiased">
    @yield('content')
</body>
</html>