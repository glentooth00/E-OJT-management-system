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
                        <h4 class="mt-1"><b>CERTIFICATE OF GOOD MORAL CHARACTER</b></h4>
                    </div>
                    <br><br><br>
                    <div>
                        <p>To Whom It May Concern:</p>
                    </div>
                    <div>
                        <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            This is to certify that ________________________________________________________________ is a
                            bonafide student of Nothern Iloilo State University
                            , Estancia, Iloilo for Academic Year, _____________ - _____________.
                        </p>
                    </div>
                    <div class="mt-4">
                        <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Our records show that he/she had not been subjected to any disciplinary action during his/her
                            stay in this institution.
                        </p>
                    </div>
                    <div class="mt-4">
                        <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            This certification is being issued for his/her application for On-the-Job Training (OJT) as
                            perscribed by his/her course.
                        </p>
                    </div>
                    <div class="mt-4">
                        <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Issued this _________ day of ______________, 20____, at NISU, Estancia, Iloilo.
                        </p>
                    </div>
                    <div style="float: right; margin-right: 100px;">
                        <br><br><br>
                        <div style="border-top: 1px solid gray;">
                            <p>
                                Guidance Counselor
                            </p>
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
