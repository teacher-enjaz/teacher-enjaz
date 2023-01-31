// Add writing
/**
 *
 * @type {HTMLElement}
 */
var slider1 = document.getElementById("customRange1");
var output1 = document.getElementById("writing");
var gradeWriteAdd = document.getElementById("gradeWritingAdd");
output1.innerHTML = slider1.value;

slider1.oninput = function() {
    output1.innerHTML = this.value;
    if (this.value >= 75)
        gradeWriteAdd.innerHTML = "ممتاز"

    else if(this.value >= 50)
        gradeWriteAdd.innerHTML = " متوسط"

    else if(this.value > 5)
        gradeWriteAdd.innerHTML = "ضعيف "

    else if(this.value < 5)
        gradeWriteAdd.innerHTML = " ضعيف جدا "
}

//Edit writing
var slider01 = document.getElementById("customRange02");
var output01 = document.getElementById("writing02");
var gradeWritingEdit = document.getElementById("gradeWritingEdit");

output01.innerHTML = slider01.value;

slider01.oninput = function() {
    output01.innerHTML = this.value;
    if (this.value >= 75)
        gradeWritingEdit.innerHTML = "ممتاز"

    else if(this.value >= 50)
        gradeWritingEdit.innerHTML = " متوسط"

    else if(this.value > 5)
        gradeWritingEdit.innerHTML = "ضعيف "

    else if(this.value < 5)
        gradeWritingEdit.innerHTML = " ضعيف جدا "
}
/**
 *
 * @type {HTMLElement}
 */
    // Add reading
var slider2 = document.getElementById("customRange2");
var output2 = document.getElementById("reading");
var gradeReadingAdd= document.getElementById("gradeReadingAdd");
output2.innerHTML = slider2.value;

slider2.oninput = function() {
    output2.innerHTML = this.value;
    if (this.value >= 75)
        gradeReadingAdd.innerHTML = "ممتاز"

    else if(this.value >= 50)
        gradeReadingAdd.innerHTML = " متوسط"

    else if(this.value > 5)
        gradeReadingAdd.innerHTML = "ضعيف "

    else if(this.value < 5)
        gradeReadingAdd.innerHTML = " ضعيف جدا "
}
//Edit reading
var slider02 = document.getElementById("customRange03");
var output02 = document.getElementById("reading03");
var gradeReadingEdit = document.getElementById("gradeReadingEdit");

output02.innerHTML = slider02.value;

slider02.oninput = function() {
    output02.innerHTML = this.value;
    if (this.value >= 75)
        gradeReadingEdit.innerHTML = "ممتاز"

    else if(this.value >= 50)
        gradeReadingEdit.innerHTML = " متوسط"

    else if(this.value > 5)
        gradeReadingEdit.innerHTML = "ضعيف "

    else if(this.value < 5)
        gradeReadingEdit.innerHTML = " ضعيف جدا "
}
// Add speaking

var slider3 = document.getElementById("customRange3");
var output3 = document.getElementById("speaking");
var gradeSpeakingAdd = document.getElementById("gradeSpeakingAdd");
output3.innerHTML = slider3.value;

slider3.oninput = function() {
    output3.innerHTML = this.value;
    if (this.value >= 75)
        gradeSpeakingAdd.innerHTML = "ممتاز"

    else if(this.value >= 50)
        gradeSpeakingAdd.innerHTML = " متوسط"

    else if(this.value > 5)
        gradeSpeakingAdd.innerHTML = "ضعيف "

    else if(this.value < 5)
        gradeSpeakingAdd.innerHTML = " ضعيف جدا "
}

//Edit speaking
var slider03 = document.getElementById("customRange04");
var output03 = document.getElementById("speaking04");
var gradeSpeakingEdit = document.getElementById("gradeSpeakingEdit");

output03.innerHTML = slider03.value;

slider03.oninput = function() {
    output03.innerHTML = this.value;
    if (this.value >= 75)
        gradeSpeakingEdit.innerHTML = "ممتاز"

    else if(this.value >= 50)
        gradeSpeakingEdit.innerHTML = " متوسط"

    else if(this.value > 5)
        gradeSpeakingEdit.innerHTML = "ضعيف "

    else if(this.value < 5)
        gradeSpeakingEdit.innerHTML = " ضعيف جدا "
}
