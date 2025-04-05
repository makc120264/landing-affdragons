<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex">
    <meta name="referrer" content="no-referrer">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>Protect Your Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="assets/landing-curl.js"></script>
    <script src="assets/translate.js"></script>
    <script>
        const evinaRequestId = (() => 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, (c) => {
            let r = Math.random() * 16 | 0,
                v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        }))();

        $.ajax({
            url: `https://ksg.intech-mena.com/MSG/v1.1/API/GetScript?applicationId=224&countryId=247&requestId=${evinaRequestId}&cpId=97&buttonId=btn-st1`,
            type: 'GET',
            success: function (result) {
                if (result != null) {
                    const fraudScript = document.createElement('script');
                    fraudScript.text = result[100];
                    document.head.prepend(fraudScript);
                    //Running the head script of evina
                    const event = new Event('DCBProtectRun');
                    document.dispatchEvent(event);
                    $('#fnum').append('<input type="hidden" id="token" name="token" value="' + evinaRequestId + '">');
                }
            }
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="row row-first">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <figure class="figure">
                                <img src="assets/397273002-90.jpg" class="figure-img img-fluid rounded" alt="...">
                                <div id="turnOn" class="turn-on figure-caption col-12">Turn On your Antivirus Now</div>
                            </figure>
                        </div>
                        <div class="col-4">
                            <figure id="f-reminder" class="f-reminder figure" dir="ltr">
                                <img src="assets/danger45.png" class="figure-img img-fluid rounded" alt="...">
                                <figcaption id="reminder" class="reminder figure-caption">Important Reminder</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 text-center">
                <select id="languageSwitcher" class="form-select rounded-0 text-center w-100">
                    <option>EN</option>
                    <option>AR</option>
                </select>
            </div>
        </div>

        <div class="row text-center safe">
            <div class="container-fluid">
                <div class="row r-figure">
                    <figure class="figure">
                        <img src="assets/safe-your-data.png" class="safe-data figure-img img-fluid rounded" alt="safe data">
                        <figcaption id="protect" class="protect figure-caption">Protect Your Data!</figcaption>
                    </figure>
                </div>
                <div class="row">
                    <div class="the-best">
                        <p id="the-best-1">The BEST Antivirus</p>
                        <p id="the-best-2">Protection</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center phone">
            <div class="blok1 col-md-6 col-sm-12 mx-auto">
                <p id="errorPhone" class="orange text-error" style="display: none">Error: Invalid phone</p>
                <div class="enter">
                    <p id="enterPhone">Enter your phone number</p>
                </div>
                <form id="fnum" onsubmit="event.preventDefault();">
                    <div dir="ltr" class="phone-control phone-control_custom field" id="phone-control">
                        <div id="phoneLabel" class="field-label">Mobile number</div>
                        <span class="flag">
                            <svg class="field-icon" width="14" height="23" viewBox="0 0 14 23"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 22.5C1.45 22.5 0.979333 22.3043 0.588 21.913C0.196 21.521 0 21.05 0 20.5V2.5C0 1.95 0.196 1.479 0.588 1.087C0.979333 0.695667 1.45 0.5 2 0.5H12C12.55 0.5 13.021 0.695667 13.413 1.087C13.8043 1.479 14 1.95 14 2.5V20.5C14 21.05 13.8043 21.521 13.413 21.913C13.021 22.3043 12.55 22.5 12 22.5H2ZM7 20C7.28333 20 7.521 19.904 7.713 19.712C7.90433 19.5207 8 19.2833 8 19C8 18.7167 7.90433 18.4793 7.713 18.288C7.521 18.096 7.28333 18 7 18C6.71667 18 6.47933 18.096 6.288 18.288C6.096 18.4793 6 18.7167 6 19C6 19.2833 6.096 19.5207 6.288 19.712C6.47933 19.904 6.71667 20 7 20ZM2 15.5H12V5.5H2V15.5Z"></path>
                            </svg>&nbsp+971
                        </span>
                        <input type="tel" inputmode="tel" placeholder="_ _ _ _ _ _ _ _ _" name="msisdn" maxlength="10"
                               required class="tel form-control field-input w-100" id="tel">
                    </div>
                    <div class="form-submit">
                        <button type="button" id="btn-st1" class="btn btn-primary w-100">Continue!</button>
                    </div>
                </form>
            </div>
            <div dir="ltr" class="blok2 col-md-6 col-sm-12 mx-auto" style="display: none">
                <div class="enter">
                    <p id="enterPin">Enter your Pin code</p>
                </div>
                <p id="errorPin" class="orange text-error" style="display: none">Invalid pin</p>

                <form id="fpin" onsubmit="event.preventDefault();">
                    <div class="phone-control" id="pin-control">
                        <input type="text" inputmode="tel" pattern="[0-9]{4}" placeholder="_ _ _ _" name="pin" value=""
                               maxlength="4" size="4" required class="tel form-control field-input w-100" id="pin" autocomplete="off">
                    </div>
                    <div class="form-submit">
                        <button type="button" id="btn-st2" class="btn btn-primary w-100">Continue</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="row row-last"></div>
    </div>
</div>
</body>
</html>