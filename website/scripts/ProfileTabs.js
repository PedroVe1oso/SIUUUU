let profileButtons=document.querySelectorAll(".profileTabsContainer .buttonContainer button");
let profilePanels=document.querySelectorAll(".profileTabsContainer .profileTab");

function showPanel(panelIndex, colorCode) {
    profileButtons.forEach(function (node) {
        node.style.backgroundColor="";
        node.style.color="";
    });
    profileButtons[panelIndex].style.backgroundColor=colorCode;
    profileButtons[panelIndex].style.color="white";

    profilePanels.forEach(function (node) {
        node.style.display="none";
    });
    profilePanels[panelIndex].style.display="block";
    profilePanels[panelIndex].style.backgroundColor="colorCode";

}
showPanel(0, '#808080');