const steps = Array.from(document.querySelectorAll("form .step"));
const nextBtn = document.querySelectorAll("form .next-btn");
const prevBtn = document.querySelectorAll("form .prev-btn");
const form = document.querySelector("form");

nextBtn.forEach((button) => {
  button.addEventListener("click", () => {
    changeStep("next");
  });
});
prevBtn.forEach((button) => {
  button.addEventListener("click", () => {
    changeStep("prev");
  });
});

// form.addEventListener("submit", (e) => {
//   e.preventDefault();



//   console.log(inputs);
//   form.reset();
// });

function changeStep(btn) {
  let index = 0;
  const active = document.querySelector(".active");
  index = steps.indexOf(active);
  steps[index].classList.remove("active");

  var nama = document.getElementById('nama').value;
  var no_ktp = document.getElementById('no_ktp').value;
  var no_wa = document.getElementById('no_wa').value;
  var email = document.getElementById('email').value;

  var provinsi = document.getElementById('provinsi').value;
  var kota = document.getElementById('kota').value;
  var kecamatan = document.getElementById('kecamatan').value;
  var alamat = document.getElementById('alamat').value;

  if (btn === "next") {
    if (index == 0) {
      if (nama == "" || no_ktp == "" || no_wa == "" || email == "") {
        alert("Harap Mengisi Form Terlebih Dahulu!");
      } else {
        document.getElementById("next").disabled = false;
        index++;
      }
    } else if (index == 1) {
      if (provinsi == "" && kota == "" && kecamatan == "" && alamat == "") {
        alert("Harap Mengisi Form Terlebih Dahulu!");
      } else {
        if (provinsi == "" || kota == "" || kecamatan == "" || alamat == "") {
          document.getElementById("next").disabled = true;
          alert("Harap Mengisi Form Terlebih Dahulu!");
        } else {
          document.getElementById("next").disabled = false;
          index++;
        }
      }
    } 
    // index++;

  } else if (btn === "prev") {
    if (index == 1) {
      document.getElementById("next").disabled = false;
      index--;
    }
    if (index == 2) {
      document.getElementById("next").disabled = false;
      index--;
    }
    if (index == 3) {
      document.getElementById("next").disabled = false;
      index--;
    }
    // index--;
  }
  steps[index].classList.add("active");
  console.log(index);
}