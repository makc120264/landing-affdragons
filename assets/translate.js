document.addEventListener("DOMContentLoaded", function () {
    const translations = {
        en: {
            direction: "ltr",
            turnOn: "Turn On your Antivirus Now",
            reminder: "Important Reminder",
            protect: "Protect Your Data!",
            theBest1: "The BEST Antivirus",
            theBest2: "Protection",
            enterPhone: "Enter your phone number",
            phoneLabel: "Mobile number",
            btnSt1: "Continue!",
            btnSt2: "Continue",
            enterPin: "Enter your Pin code",
            errorPin: "Invalid pin",
            errorPhone: "Error: Invalid phone"
        },
        ar: {
            direction: "rtl",
            turnOn: "قم بتشغيل برنامج مكافحة الفيروسات الخاص بك الآن",
            reminder: "تذكير هام",
            protect: "حماية بياناتك!",
            theBest1: "أفضل برنامج مكافحة الفيروسات",
            theBest2: "حماية",
            enterPhone: "أدخل رقم هاتفك",
            phoneLabel: "رقم الهاتف المحمول",
            btnSt1: "يكمل!",
            btnSt2: "يكمل",
            enterPin: "أدخل رمز PIN الخاص بك",
            errorPin: "رقم التعريف الشخصي غير صالح",
            errorPhone: "خطأ: هاتف غير صالح"
        }
    };

    const languageSwitcher = document.getElementById("languageSwitcher");

    const turnOn = document.getElementById("turnOn");
    const reminder = document.getElementById("reminder");
    const protect = document.getElementById("protect");
    const theBest1 = document.getElementById("the-best-1");
    const theBest2 = document.getElementById("the-best-2");
    const enterPhone = document.getElementById("enterPhone");
    const phoneLabel= document.getElementById("phoneLabel");
    const btnSt1 = document.getElementById("btn-st1");
    const btnSt2 = document.getElementById("btn-st2");
    const enterPin = document.getElementById("enterPin");
    const errorPin = document.getElementById("errorPin");
    const errorPhone = document.getElementById("errorPin");
    const fReminder = document.getElementById("f-reminder");


    languageSwitcher.addEventListener("change", function () {
        const selectedLang = languageSwitcher.value.toLowerCase();

        document.body.dir = translations[selectedLang].direction;
        document.documentElement.setAttribute("lang", selectedLang);
        $(fReminder).attr('dir', translations[selectedLang].direction);

        $(turnOn).text(translations[selectedLang].turnOn);
        $(reminder).text(translations[selectedLang].reminder);
        $(protect).text(translations[selectedLang].protect);
        $(theBest1).text(translations[selectedLang].theBest1);
        $(theBest2).text(translations[selectedLang].theBest2);
        $(enterPhone).text(translations[selectedLang].enterPhone);
        $(phoneLabel).text(translations[selectedLang].phoneLabel);
        $(btnSt1).text(translations[selectedLang].btnSt1);
        $(btnSt2).text(translations[selectedLang].btnSt2);
        $(enterPin).text(translations[selectedLang].enterPin);
        $(errorPin).text(translations[selectedLang].errorPin);
        $(errorPhone).text(translations[selectedLang].errorPhone);
    });
});
