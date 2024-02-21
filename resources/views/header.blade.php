<header>
    <div class="container logo">
        <a href="#"><img src="https://carestaffservices.com/wp-content/uploads/2023/07/New-Logo.png" width="200px" alt="Care Staff Services Ltd"></a>
        <h1>Care Staff Services LTD</h1>
    </div>
</header>
<form id="multistepsform" class="bg-light p-4 rounded" style="zoom:0.8;">
    <!-- progressbar -->
    <ul id="progressbar" class="list-unstyled d-flex justify-content-between">
        <li class="active" style="display: none">Account Setup</li>
        <li @if(isset($pageTitle) && $pageTitle == 1) class="active" @endif>Home</li>
        <li @if(isset($pageTitle) && $pageTitle == 2) class="active" @endif>Terms & Conditions</li>
        <li @if(isset($pageTitle) && $pageTitle == 3) class="active" @endif>Profiles</li>
        <li @if(isset($pageTitle) && $pageTitle == 4) class="active" @endif>Experience & Job</li>
        <li @if(isset($pageTitle) && $pageTitle == 5) class="active" @endif>Social Profiles</li>
        {{-- <li @if(isset($pageTitle) && $pageTitle == 6) class="active" @endif>Social Profiles</li> --}}

    </ul>
    <!-- fieldsets -->
</form>
