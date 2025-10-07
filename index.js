function validarNome() {
  const nome = document.getElementById("name").value.trim();

  const regexLetras = /^[A-Za-zÀ-ÿ\s]+$/;

  if (nome.length < 3) {
    alert("O nome deve ter pelo menos 3 letras.");
    return false;
  }

  if (!regexLetras.test(nome)) {
    alert("O nome deve conter apenas letras e espaços (sem números ou símbolos).");
    return false;
  }

  const partes = nome.split(" ").filter(p => p.length > 0);

  if (partes.length < 2) {
    alert("Por favor, digite seu nome completo (nome e sobrenome).");
    return false;
  }

  if (partes.some(p => p.length < 2)) {
    alert("Cada parte do nome deve ter pelo menos 2 letras.");
    return false;
  }

  alert("Mensagem enviada com sucesso!");
  window.location.href = "index.html";

  return false;
}