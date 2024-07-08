const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('.sidebar ul li a').forEach(link => {
  if(link.href.includes(`${activePage}`)){
    link.classList.add('active');
    console.log(link);
  }
})
