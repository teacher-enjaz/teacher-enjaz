/*
const WCAG_MINIMUM_RATIOS = [
    ['AA Large', 3],
    ['AA', 4.5],
    ['AAA', 7],
]*/


/* Get references to all the elements we'll need */
/*let preview = document.getElementById('preview')
let statusText = document.getElementById('status-text')*/
/*
let statusRatio = document.getElementById('status-ratio')
let statusLevel = document.getElementById('status-level')
let textColorInput = document.getElementById('input-text')
let bgColorInput = document.getElementById('input-background')
*/

/* Attach the event listener */
/*textColorInput.addEventListener('input', handleColorChange)
bgColorInput.addEventListener('input', handleColorChange)*/

/* Fire the listener once to initialize the app */
//handleColorChange()
/*changeColor()
backChangeColor()*/
/**
 * ============================================================================
 * Event listener to update the app
 * ============================================================================
 */
/* Get references to all the elements we'll need */
let body1 = document.querySelector('body')
let container1 = document.getElementsByClassName('.container')
let image1 = document.querySelector('img')
let button1 = document.querySelector('button')
let h_1 = document.querySelector('h1')
let h_2 = document.querySelector('h2')
let h_3 = document.querySelector('h3')
let h_4 = document.querySelector('h4')
let h_5 = document.querySelector('h5')
let h_6 = document.querySelector('h6')
let section1 = document.querySelector('section')
let label1 = document.querySelector('label')
let a1 = document.getElementsByClassName('.btn_add_user')
let div1 = document.querySelector('div')
let span1 = document.querySelector('span')
let small1 = document.querySelector('small')
let i1 = document.querySelector('i')
let div2 = document.getElementsByClassName('.box')
/**
 * ============================================================================
 * Event listener to update the app
 * ============================================================================
 */
function changeColor() {
    body1.style.color = "#ffe66b";
    body1.style.backgroundColor = "#222222";
    button1.style.backgroundColor = "#ffe66b";
    image1.style.filter = "brightness(500%)";
    image1.style.filter = "contrast(500%)";
    h_1.style.color = "#ffe66b";
    h_2.style.color = "#ffe66b";
    h_3.style.color = "#ffe66b";
    h_4.style.color = "#ffe66b";
    h_5.style.color = "#ffe66b";
    h_6.style.color = "#ffe66b";
    // a1.style.backgroundColor = "#ffe66b"
    //a1.style.backgroundColor = "#ffe66b"
    section1.style.backgroundColor = "#222222";
    label1.style.backgroundColor = "#222222";
    label1.style.color = "#ffe66b";
    span1.style.color = "#ffe66b";
    small1.style.color = "#ffe66b";
    div1.style.backgroundColor = "#222222";
    div2.style.backgroundColor = "#222222";
    div2.style.color = "#ffe66b";
    i1.style.backgroundColor = "#222222";
    body1.style.fontSize = "30px";
    //container1.style.backgroundColor = "#222222"

    /*preview.style.color = "#ffe66b"//textColor
    preview.style.backgroundColor = "#222222"//bgColor*/
    /*
        let ratio = checkContrast("#ffe66b"/!*textColor*!/, "#222222"/!*bgColor*!/)
        let { didPass, maxLevel } = meetsMinimumRequirements(ratio)

        statusText.classList.toggle('is-pass', didPass)
        statusRatio.innerText = formatRatio(ratio)
        statusLevel.innerText = didPass ? maxLevel : 'Fail'*/
}


function backChangeColor() {
    window.location.reload()
}
function handleColorChange() {
    let textColor = textColorInput.value
    let bgColor = bgColorInput.value

    preview.style.color = "#ffe66b"//textColor
    preview.style.backgroundColor = "#222222"//bgColor

    let ratio = checkContrast("#ffe66b"/*textColor*/, "#222222"/*bgColor*/)
    let { didPass, maxLevel } = meetsMinimumRequirements(ratio)

    statusText.classList.toggle('is-pass', didPass)
    statusRatio.innerText = formatRatio(ratio)
    statusLevel.innerText = didPass ? maxLevel : 'Fail'
}

/**
 * ============================================================================
 * Utility functions for color luminance and contrast ratios
 * ============================================================================
 */

/**
 * Calculate the relative luminance of a color. See the defintion of relative
 * luminance in the WCAG 2.0 guidelines:
 * https://www.w3.org/TR/2008/REC-WCAG20-20081211/#relativeluminancedef
 *
 * @param {number} r The red component (0-255)
 * @param {number} g The green component (0-255)
 * @param {number} b The blue component (0-255)
 * @returns {number}
 */
function luminance(r, g, b) {
    let [lumR, lumG, lumB] = [r, g, b].map(component => {
        let proportion = component / 255;

        return proportion <= 0.03928
            ? proportion / 12.92
            : Math.pow((proportion + 0.055) / 1.055, 2.4);
    });

    return 0.2126 * lumR + 0.7152 * lumG + 0.0722 * lumB;
}

/**
 * Calculate the contrast ratio between the relative luminance values of two
 * colors. See the definition of contrast ratio in the WCAG 2.0 guidelines:
 * https://www.w3.org/TR/2008/REC-WCAG20-20081211/#contrast-ratiodef
 *
 * @param {number} luminance1 The relative luminance of the first color (0-1)
 * @param {number} luminance2 The relative luminance of the second color (0-1)
 * @returns {number}
 */
function contrastRatio(luminance1, luminance2) {
    let lighterLum = Math.max(luminance1, luminance2);
    let darkerLum = Math.min(luminance1, luminance2);

    return (lighterLum + 0.05) / (darkerLum + 0.05);
}

/**
 * Calculate the contrast ratio between two colors. The minimum contrast is 1,
 * and the maximum is 21.
 *
 * @param {string} color1 The six-digit hex code of the first color
 * @param {string} color2 The six-digit hex code of the second color
 * @returns {number}
 */
function checkContrast(color1, color2) {
    let [luminance1, luminance2] = [color1, color2].map(color => {
        /* Remove the leading hash sign if it exists */
        color = color.startsWith("#") ? color.slice(1) : color;

        let r = parseInt(color.slice(0, 2), 16);
        let g = parseInt(color.slice(2, 4), 16);
        let b = parseInt(color.slice(4, 6), 16);

        return luminance(r, g, b);
    });

    return contrastRatio(luminance1, luminance2);
}

/**
 * Format the given contrast ratio as a string (ex. "4.3:1" or "17:1")
 *
 * @param {number} ratio
 * @returns {string}
 */
function formatRatio(ratio) {
    let ratioAsFloat = ratio.toFixed(2)
    let isInteger = Number.isInteger(parseFloat(ratioAsFloat))
    return `${isInteger ? Math.floor(ratio) : ratioAsFloat}:1`
}

/**
 * Determine whether the given contrast ratio meets WCAG requirements at any
 * level (AA Large, AA, or AAA). In the return value, `isPass` is true if
 * the ratio meets or exceeds the minimum of at least one level, and `maxLevel`
 * is the strictest level that the ratio passes.
 *
 * @param {number} ratio The contrast ratio (1-21)
 * @returns {{ isPass: boolean, maxLevel: "AAA"|"AA"|"AA Large" }}
 */
function meetsMinimumRequirements(ratio) {
    let didPass = false
    let maxLevel = null

    for (const [level, minRatio] of WCAG_MINIMUM_RATIOS) {
        if (ratio < minRatio) break

        didPass = true
        maxLevel = level
    }

    return { didPass, maxLevel }
}



