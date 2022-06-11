const form = document.getElementById("form{{$shop->id}}")
const submitButton = document.getElementById("submit_button_{{shop_id}}")

submitButton.onclick = () => {
  const formData = new FormData(form)
  const action = form.getAttribute("action")
  const options = {
    method: 'POST',
    body: formData,
  }
}