const showImagePreview = function () {
    const image = document.querySelector("#image");
    const imagePreview = document.querySelector(".img-preview");

    imagePreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imagePreview.src = oFREvent.target.result;
    };
};
