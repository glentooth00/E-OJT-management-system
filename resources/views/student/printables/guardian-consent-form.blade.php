@extends('includes.layouts.students')

@section('content')
    <!-- Container Fluid-->
    <div class="row mb-5">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="#" class="btn btn-primary mb-4 float-right" onclick="printCard()"><i class="fas fa-print">
                    Print</i></a>
            <br><br><br>
            <div class="card" id="printableCard">
                <div class="card-body">
                    <div class="text-center">
                        <span>Republic of the Philippines</span>
                        <h5><b>NOTHERN ILOILO STATE UNIVERSITY</b></h5>
                        <span>NISU Main Campus, V Cudilla Sr. Ave., Estancia Iloilo</span>
                    </div>
                    <div class="text-center mt-5" style="border-top: 1px solid gray; border-bottom: 1px solid gray;">
                        <h4 class="mt-1"><b>PARENT - GUARDIAN CONSENT FORM</b></h4>
                    </div>
                    <br><br><br>
                    <div>
                        <div class="row pl-5">
                            <div class="col-md-6">
                                <span>Name of Student: ___________________________________________________</span>
                            </div>
                            <div class="col-md-6">
                                <span>Course, Year & Section: ___________________________________________________</span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Name of Parent/Guardian: ___________________________________________</span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Relationship to student: __________________________________________________</span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Address: ___________________________________________________________</span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Contact No.: ____________________________________________________________</span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Name of Activity: ___________________________________________________</span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Date & Venue: ___________________________________________________________ </span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Curricular, specify: __________________________________________________</span>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span>Extra-Curricular, Specify: _________________________________________________</span>
                            </div>
                        </div>
                        <div class="">
                            <div class="text-center mt-5">
                                <span style="font-size: 20px;">C O N S E N T</span><br>
                                <span>(please read carefully)</span>
                            </div>
                            <div class="pl-5 pr-5 mt-4">
                                <ol>
                                    <li>I Agree to my son/ daughter taking part in the activlity approved and endorsed by the university authorities.</li>
                                    <li>I undersdant to the best of knowledge that the activity is relevant and beneficial to my son/ daughter for his/ her personal academic development.</li>
                                    <li>I consent my son/ daughter to travel by any form of public/private transport, by an organization adviser or any other guardian attending, to any event in which the university organization is participating.</li>
                                    <li>
                                        I understand that the University abd activity organizer accept no responsibility to loss, damage or injury caused by or during attendance on any of the 
                                        activities except where such loss, damage and injury can be shown to result directly from the negligence of the university and the organizer.
                                    </li>
                                </ol>
                            </div>
                            <div class="pl-5 pr-5 mt-5">
                                <p class="pl-5">
                                    <span><b>IN WITNESS WHEREOF,</b> I have hereunto affixed my signature beloew this _____________ day of ________)__________at_________________________________.</span>
                                </p>
                            </div>
                            <div class="float-right pr-5 mt-4 text-center">
                                ______________________________________________ <br>
                                <span><i>Parent/Guardian Signature over Prented Name</i></span>
                                
                            </div>
                            <br><br><br>
                            <div class="pl-5 pr-5 mt-5">
                                <p class="pl-5">
                                    <span><b>SUBSCRIBED AND SWORN</b></span> to before me this _______ day of __________________________________,
                                    affiant personally exhibiting to me his/ her Community Tax Certificate No. ______________________________ issued at 
                                    ______________________________ on ___________________________________.
                                </p>
                            </div>
                            <div class="pl-5 pr-5 mt-5">
                                <div class="float-right pr-5 mt-4 text-center">
                                    <p><i>NOTARY PUBLIC</i></p>
                                </div>
                                <br><br>
                                <p class="pl-5">Doc. No.: __________________________</p>
                                <p class="pl-5">Page No.: __________________________</p>
                                <p class="pl-5">Book No.: __________________________</p>
                                <p class="pl-5">Series of:__________________________ </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <script>
        function printCard() {
            // Get the HTML of the card
            var cardContent = document.getElementById('printableCard').innerHTML;

            // Create a new window
            var printWindow = window.open('', '', 'height=600,width=800');

            // Write the content to the new window
            printWindow.document.write('<html><head><title>Print</title>');
            printWindow.document.write(
                '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">'
                ); // Add Bootstrap CSS if needed
            printWindow.document.write('</head><body >');
            printWindow.document.write(cardContent);
            printWindow.document.write('</body></html>');

            // Close the document to trigger the print
            printWindow.document.close();

            // Print the content
            printWindow.print();
        }
    </script>
    <!---Container Fluid-->
@endsection
