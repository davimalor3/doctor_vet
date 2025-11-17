// mascara de entrada para validar numero de telefone
const telefoneMask = document.querySelector("#telefone");

if (telefoneMask) {
  telefoneMask.addEventListener("input", function () {
    this.value = this.value
      .replace(/\D/g, "")
      .replace(/(\d{2})(\d)/, "($1) $2")
      .replace(/(\d{4,5})(\d)/, "$1-$2")
      .replace(/(-\d{4})\d+?$/, "$1");
  });
}
