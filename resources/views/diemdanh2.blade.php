@extends('layouts.app')
@section('content')
    @include('layouts.navigartionbarMain')

    <body>
        <div class="container" style="margin-top:50px">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="font-size: 20px;
                        font-family: Verdana, Geneva, Tahoma, sans-serif;
                        font-weight: bold;
                        color: #001f3f;
                        ">
                        <span style="margin-left:30%">ĐIỂM DANH GƯƠNG MẶT</span></div>

                        <div class="card-body">

                                <div class="form-group row mb-0">
                                    <label for="email" class="col-md-8 offset-md-5">Lớp: {{$lophoc->ten_lop}}</label>
                                    <label style="color:red" class="col-md-8 offset-md-3">Lưu ý: ngồi yên 1 chỗ và đưa mặt
                                        vào gần màn hình</label>

                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-5">
                                        <button type="button" class="btn btn-primary" onclick="init()">
                                            Điểm danh
                                        </button>

                                    </div>
                                </div>


                                <div class="form-group row mb-0"  >
                                    <label class="col-md-8 offset-md-5">Mã user: <span id="label-container"></span></label>
                                </div>
                                <div class="form-group row mb-0" style="margin-top: 10px" >
                                    <div id="webcam-container" class="col-md-8 offset-md-4"></div>
                                    <label for="info" id="info" class="col-md-8 offset-md-5"></label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="label-container"></div>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
        <script type="text/javascript">
            // More API functions here:
            // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

            // the link to your model provided by Teachable Machine export panel
            const URL = "https://teachablemachine.withgoogle.com/models/05WXlh1OT/";

            let model, webcam, labelContainer, maxPredictions;
            var userID;

            // Load the image model and setup the webcam
            async function init() {

                const modelURL = URL + "model.json";
                const metadataURL = URL + "metadata.json";

                // load the model and metadata
                // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
                // or files from your local hard drive
                // Note: the pose library adds "tmImage" object to your window (window.tmImage)
                model = await tmImage.load(modelURL, metadataURL);
                maxPredictions = model.getTotalClasses();

                // Convenience function to setup a webcam
                const flip = true; // whether to flip the webcam
                webcam = new tmImage.Webcam(200, 200, flip); // width, height, flip
                await webcam.setup(); // request access to the webcam
                await webcam.play();
                window.requestAnimationFrame(loop);

                // append elements to the DOM
                document.getElementById("webcam-container").appendChild(webcam.canvas);
                labelContainer = document.getElementById("label-container");
                // for (let i = 0; i < maxPredictions; i++) { // and class labels
                //     labelContainer.appendChild(document.createElement("div"));
                // }
            }

            async function loop() {
                webcam.update(); // update the webcam frame
                await predict();
                window.requestAnimationFrame(loop);
            }

            function showInfomation() {
                var d = new Date();
                var h = d.getHours();
                var m = d.getMinutes();

                setTimeout(function() {
                    // alert("Hiếu đẹp trai đã vào lớp lúc "+h+":"+m);
                    document.getElementById("info").innerHTML = "đang điểm danh";
                    // window.location = "http://127.0.0.1:8000/ket-qua-diem-danh/" + userID;
                    let malop=getClassID();
                    window.location="http://127.0.0.1:8000/user/chi-tiet-lop-hoc/"+malop+"/"+userID;

                }, 2000)
            }

            function getClassID(){
                let currentURL=window.location.href;
                let res=currentURL.split("/");
                // đường link sẽ ở dạng: https://127.0.0.1:8000/diemdanh/{malop}
                let classID=res[4];
                return classID;
            }

            // run the webcam image through the image model
            async function predict() {
                // predict can take in an image, video or canvas html element
                const predictions = await model.predictTopK(webcam.canvas);
                // for (let i = 0; i < maxPredictions; i++) {
                //     const classPrediction =
                //         prediction[i].className + ": " + prediction[i].probability.toFixed(2);
                //     labelContainer.childNodes[i].innerHTML = classPrediction;
                // }
                userID = predictions[0].className;
                showInfomation()
                labelContainer.innerHTML = predictions[0].className;
                return userID;
            }
            document.title="Điểm danh";
        </script>

    </body>
@endsection
