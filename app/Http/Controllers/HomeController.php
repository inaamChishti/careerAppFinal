<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Response;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */




    public function verify_code(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->first();

        if ($user) {
            // Verification successful, log in the user
            Auth::login($user);

            // Clear the verification code in the database
            $user->update(['verification_code' => null]);


            return redirect()->route('userDashboard');// Redirect to the dashboard or any desired route after successful login
        } else {
            return redirect()->route('customRegister', [
                'email' => $request->email,
                'error' => 'Invalid verification code or email a new code has been sent again to your email.',
            ]);
        }


    }

    public function customAuthStepOne(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email already exists in the database
        $existingUser = User::where('email', $request->input('email'))->first();

        if (!$existingUser) {
            // Email does not exist, create a new user record
            $newUser = User::create([
                'email' => $request->input('email'),
                // Add other fields as needed
            ]);

            // Log in the newly created user
            Auth::login($newUser);
        } else {
            // Retrieve the existing user instance
            $existingUser = User::where('email', $request->input('email'))->first();

            // Check if the user has already submitted the application
            if ($existingUser->is_submit == 1) {

                return redirect()->back()->with('message', 'Your application is under review our team will conatct you shortly.');

            }

            // Log in the existing user
            Auth::login($existingUser);
        }

        return redirect()->route('customAuthStepTwo');
    }

    public function customAuthStepTwo()
    {
        return view('secondStep');
    }

    public function customAuthStepThree(Request $request)
    {
        $bio = json_encode($request->all());

        $userId = Auth::id();

        // Extract request data
        $requestData = $request->all();

        // Add user ID to request data
        $requestData['user_id'] = $userId;

        // Use updateOrCreate to either update or create a new record
        UserDetails::updateOrCreate(
            ['user_id' => $userId], // Search criteria
            $requestData // Data to update or create
        );
        return view('stepThree',compact('bio'));
    }

    public function customAuthStepFour(Request $request)
    {
        $formData = $request->all();

        if (isset($formData['bio'])) {
            $bioData = json_decode($formData['bio'], true);

            unset($formData['bio']);

            $formData = array_merge($bioData, $formData);
        }

        unset($formData['_token']);

        // dd($formData);
        return view('stepFour', compact('formData'));
    }

    public function customAuthStepFive(Request $request)
    {

        // $formData = json_decode(request('formData'), true);
        // $mergedArray = array_merge($request->all(), $formData);
        // unset($mergedArray['formData']);
        // unset($mergedArray['_token']);

        // $formData['formData'] = $mergedArray;

        // // Re-encode the merged data in the 'formData' key
        // $encodedFormData = json_encode($formData);

        // // If you want to work with the decoded data in your view, you can pass $formData directly
        // // dd($formData);

        // // If you want to work with the encoded data in your view, pass $encodedFormData
        // $formData = $formData['formData'];
        // $desiredOrder = [
        //     "title",
        //     "firstName",
        //     "lastName",
        //     "preferredName",
        //     "postcode",
        //     "address1",
        //     "address2",
        //     "town",
        //     "phone"
        // ];

        // $orderedData = array_merge(
        //     array_intersect_key($formData, array_flip($desiredOrder)),
        //     $formData
        // );



        //  $formData = json_encode($orderedData);

        // return view('stepFive', compact('formData'));

        $formData = json_decode(request('formData'), true);
        $mergedArray = array_merge($request->all(), $formData);
        unset($mergedArray['formData']);
        unset($mergedArray['_token']);

        $formData['formData'] = $mergedArray;

        // Re-encode the merged data in the 'formData' key
        $encodedFormData = json_encode($formData);

        // If you want to work with the decoded data in your view, you can pass $formData directly
        // dd($formData);

        // If you want to work with the encoded data in your view, pass $encodedFormData
        $formData = $formData['formData'];
        $desiredOrder = [
            "title",
            "firstName",
            "lastName",
            "preferredName",
            "postcode",
            "address1",
            "address2",
            "town",
            "phone"
        ];

        $orderedData = array_merge(
            array_intersect_key($formData, array_flip($desiredOrder)),
            $formData
        );



        $request['prev_data'] = json_encode($orderedData);

        // Unset all other keys in $request
        foreach ($request->all() as $key => $value) {
            if ($key !== 'prev_data') {
                unset($request[$key]);
            }
        }
        unset($request['formData']);
        // dd($request->all());

        // Display only the 'prev_data' key
        $requestData = ['prev_data' => $request['prev_data']];
        // dd($requestData);
        $requestData = $request->all();
        $prevData = json_decode($requestData['prev_data'], true);

        unset($requestData['_token']);
        $requestData['prev_data'] = $prevData;

        $pdfContent = null;

        $logoPath = 'https://carestaffservices.com/wp-content/uploads/2023/07/New-Logo.png';
        $logo = '<img src="' . $logoPath . '" alt="Logo" style="display: block; margin: auto; max-width: 40%; max-height: 40%;">';

        // Include the original request data with both logo and text centered
        $pdfContent .= '<div style="text-align: center;">';
        $pdfContent .= $logo.'<br>'.'<strong style="font-size:12px;">Unit 10, Progress park, Whittleparkway, Slough, SL1 6DQ</strong><br>'.'<span style="font-size:12px;">Care Staff Service</span>'.'<br><br>';
        // $pdfContent .= "";
        $pdfContent .= '</div>';






        // Include personal information questions first
        $personalInfoFields = [
            "title", "firstName", "lastName", "preferredName",
            "postcode", "address1", "address2", "town", "phone",
        ];

        foreach ($personalInfoFields as $field) {
            if (array_key_exists($field, $requestData)) {
                $pdfContent .= $this->formatQuestionAnswer($field, $requestData[$field]);
                $pdfContent .= "<br>";
            }
        }

        // Include data from 'prev_data' before 'entries'
        if (isset($requestData['prev_data'])) {
            $pdfContent .= $this->formatQuestionAnswer('prev_data', $requestData['prev_data']);
            $pdfContent .= "<br>";
        }

        // Include the remaining questions
        $remainingQuestions = array_diff(array_keys($requestData), $personalInfoFields, ['prev_data', 'entries']);

        foreach ($remainingQuestions as $key) {
            $pdfContent .= $this->formatQuestionAnswer($key, $requestData[$key]);
            $pdfContent .= "<br>";
        }

        // Include 'entries' data in a table
        if (isset($requestData['entries']) && is_array($requestData['entries'])) {
            $pdfContent .= $this->formatEntriesAsTable($requestData['entries']);
            $pdfContent .= "<br>";
        }



        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($pdfContent);
        $pdfString = $pdf->output();

        // Download the PDF
        $user = Auth::user();

        // Update the is_submit column to 1
        $user->update(['is_submit' => 1]);


        // return response($pdfString)
        //     ->header('Content-Type', 'application/pdf')
        //     ->header('Content-Disposition', 'attachment; filename="form_data.pdf"');



        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($pdfContent);
        $pdfString = $pdf->output();
        Mail::send([], [], function ($message) use ($pdfString) {
            $message->to('ghafoor777@hotmail.com')
            // $message->to('no-reply@carestaffservices.uk')
                ->subject('A new applicant registered')
                ->html('A new applicant singed up and fill the initial recruitment form on our Career Portal. Application form is attached herewith this email in PDF format.')
                ->attachData($pdfString, 'form_data.pdf', ['mime' => 'application/pdf']);
        });
        Mail::send([], [], function ($message) {
            $message->to(auth()->user()->email)
                ->subject('New Job Application Received')
                ->html('<p><img alt="" src="https://carestaffservices.com/wp-content/uploads/2023/07/New-Logo.png" style="height:173px; width:516px" /></p>

                <p><span style="font-size:14px">Dear Applicant,</span></p>

                <p><span style="font-size:14px">Thank you for submitting your application. We have received your information and it is currently under review.</span></p>

                <p><span style="font-size:14px">Our team will carefully assess your application, and we will contact you once the review process is complete.</span></p>

                <p><span style="font-size:14px">If you have any questions or concerns, feel free to reach out to us&lt;br&gt;&lt;br&gt;</span></p>

                <p><span style="font-size:14px">Best Regards,</span></p>

                <p><span style="font-size:14px">HR</span></p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>

                <hr style="height:3px;border-width:0;color:gray;background-color:pink">
                <p style="text-align:center"><strong>Care Staff Services Ltd, 10 Whittle Parkway, Slough SL1 6DQ</strong></p>
                ');
        });

        return redirect('/thankYou');
        // return view('stepFive', compact('formData'));
    }




    // public function storeAllData(Request $request)
    // {
    //     $requestData = $request->all();
    //     $prevData = json_decode($requestData['prev_data'], true);

    //     unset($requestData['_token']);
    //     $requestData['prev_data'] = $prevData;

    //     $pdfContent = null;

    //     $logoPath = 'https://carestaffservices.com/wp-content/uploads/2023/07/New-Logo.png';
    //     $logo = '<img src="' . $logoPath . '" alt="Logo" style="display: block; margin: auto; max-width: 40%; max-height: 40%;">';

    //     // Include the original request data with both logo and text centered
    //     $pdfContent .= '<div style="text-align: center;">';
    //     $pdfContent .= $logo.'<br>'.'<strong style="font-size:12px;">Unit 10, Progress park, Whittleparkway, Slough, SL1 6DQ</strong><br>'.'<span style="font-size:12px;">Care Staff Service</span>'.'<br><br>';
    //     // $pdfContent .= "";
    //     $pdfContent .= '</div>';






    //     // Include personal information questions first
    //     $personalInfoFields = [
    //         "title", "firstName", "lastName", "preferredName",
    //         "postcode", "address1", "address2", "town", "phone",
    //     ];

    //     foreach ($personalInfoFields as $field) {
    //         if (array_key_exists($field, $requestData)) {
    //             $pdfContent .= $this->formatQuestionAnswer($field, $requestData[$field]);
    //             $pdfContent .= "<br>";
    //         }
    //     }

    //     // Include data from 'prev_data' before 'entries'
    //     if (isset($requestData['prev_data'])) {
    //         $pdfContent .= $this->formatQuestionAnswer('prev_data', $requestData['prev_data']);
    //         $pdfContent .= "<br>";
    //     }

    //     // Include the remaining questions
    //     $remainingQuestions = array_diff(array_keys($requestData), $personalInfoFields, ['prev_data', 'entries']);

    //     foreach ($remainingQuestions as $key) {
    //         $pdfContent .= $this->formatQuestionAnswer($key, $requestData[$key]);
    //         $pdfContent .= "<br>";
    //     }

    //     // Include 'entries' data in a table
    //     if (isset($requestData['entries']) && is_array($requestData['entries'])) {
    //         $pdfContent .= $this->formatEntriesAsTable($requestData['entries']);
    //         $pdfContent .= "<br>";
    //     }



    //     $pdf = app('dompdf.wrapper');
    //     $pdf->loadHTML($pdfContent);
    //     $pdfString = $pdf->output();

    //     // Download the PDF
    //     $user = Auth::user();

    //     // Update the is_submit column to 1
    //     $user->update(['is_submit' => 1]);


    //     // return response($pdfString)
    //     //     ->header('Content-Type', 'application/pdf')
    //     //     ->header('Content-Disposition', 'attachment; filename="form_data.pdf"');



    //     $pdf = app('dompdf.wrapper');
    //     $pdf->loadHTML($pdfContent);
    //     $pdfString = $pdf->output();
    //     Mail::send([], [], function ($message) use ($pdfString) {
    //         // $message->to('inaam.chishti2@gmail.com')
    //         $message->to('no-reply@carestaffservices.uk')
    //             ->subject('A new applicant registered')
    //             ->html('A new applicant singed up and fill the initial recruitment form on our Career Portal. Application form is attached herewith this email in PDF format.')
    //             ->attachData($pdfString, 'form_data.pdf', ['mime' => 'application/pdf']);
    //     });
    //     Mail::send([], [], function ($message) {
    //         $message->to(auth()->user()->email)
    //             ->subject('New Job Application Received')
    //             ->html('<p><img alt="" src="https://carestaffservices.com/wp-content/uploads/2023/07/New-Logo.png" style="height:173px; width:516px" /></p>

    //             <p><span style="font-size:14px">Dear Applicant,</span></p>

    //             <p><span style="font-size:14px">Thank you for submitting your application. We have received your information and it is currently under review.</span></p>

    //             <p><span style="font-size:14px">Our team will carefully assess your application, and we will contact you once the review process is complete.</span></p>

    //             <p><span style="font-size:14px">If you have any questions or concerns, feel free to reach out to us&lt;br&gt;&lt;br&gt;</span></p>

    //             <p><span style="font-size:14px">Best Regards,</span></p>

    //             <p><span style="font-size:14px">HR</span></p>

    //             <p>&nbsp;</p>

    //             <p>&nbsp;</p>

    //             <hr style="height:3px;border-width:0;color:gray;background-color:pink">
    //             <p style="text-align:center"><strong>Care Staff Services Ltd, 10 Whittle Parkway, Slough SL1 6DQ</strong></p>
    //             ');
    //     });

    //     return redirect('/thankYou');

    // }
    private function convertArrayToString($array)
    {
        $result = "";
        foreach ($array as $key => $value) {
            $result .= $this->formatQuestionAnswer($key, $value) . "<br>";
        }
        return $result;
    }
    private function convertValueToString($value)
    {
        return is_array($value) ? $this->convertArrayToString($value) : $value;
    }

    private function formatQuestionAnswer($question, $answer)
    {
        // Define the questions to apply the special formatting
        $specialQuestions = [
            "What_type_of_care_work_are_you_looking_for",
            "What_type_of_care_jobs_have_you_done",
        ];

        if ($question === 'prev_data') {
            $formattedContent = '';
            // dd($answer);
            $data = $answer;//json_decode($answer, true);

            foreach ($data as $subQuestion => $subAnswer) {
                $formattedContent .= "<strong> " . str_replace('_', ' ', $subQuestion) . "?</strong><br>";

                // Check if the current subquestion is in the list of special questions
                if (in_array($subQuestion, $specialQuestions)) {
                    // Apply special formatting for the specified questions
                    $formattedContent .= " [" . implode(', ', array_map(function ($value) {
                        // Replace 'if (' and ')' with some text between them, replace underscores with spaces
                        $formattedValue = preg_replace_callback('/if \((.*?)\)/', function ($matches) {
                            return str_replace('_', ' ', $matches[1]);
                        }, $value);

                        // Replace underscores with spaces in the answer
                        $formattedValue = str_replace('_', ' ', $formattedValue);

                        return $formattedValue;
                    }, $subAnswer)) . "]<br>";
                } elseif ($subQuestion === "entries" && is_array($subAnswer)) {
                    // Special formatting for the "entries" array as a table
                    $formattedContent .= $this->formatEntriesAsTable($subAnswer);
                } else {
                    // Replace underscores with spaces in the answer
                    $subAnswer = str_replace('_', ' ', $subAnswer);
                    $formattedContent .= " " . $this->convertValueToString($subAnswer) . "<br>";
                }

                // Separate each question and answer pair by a line break
                $formattedContent .= "<br>";
            }

            return $formattedContent;
        } else {
            $formattedQuestion = "<strong> " . str_replace('_', ' ', $question) . "?</strong>";
            $formattedAnswer = " " . $this->convertValueToString($answer);

            // Replace underscores with spaces in the answer
            $formattedAnswer = str_replace('_', ' ', $formattedAnswer);

            // Separate each question and answer pair by a line break
            return $formattedQuestion . "<br>" . $formattedAnswer . "<br>";
        }
    }




    private function formatEntriesAsTable($entries)
{
    // Check if $entries is not empty
    if (empty($entries)) {
        return ''; // or handle it as needed
    }

    $table = '<table border="1">';

    // Create table header
    $table .= '<tr>';

    // Use reset() to get the first element of the array
    $firstEntry = reset($entries);

    foreach ($firstEntry as $key => $value) {
        $table .= '<th>' . str_replace('_', ' ', $key) . '</th>';
    }
    $table .= '</tr>';

    // Create table body
    foreach ($entries as $entry) {
        $table .= '<tr>';
        foreach ($entry as $value) {
            $table .= '<td>' . $this->convertValueToString($value) . '</td>';
        }
        $table .= '</tr>';
    }

    $table .= '</table>';
    return $table;
}

    public function customAuthBio()
    {
        return view('bio');
    }



}
