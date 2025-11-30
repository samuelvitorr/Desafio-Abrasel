const form = document.getElementById('formPessoa');
const lista = document.getElementById('listaPessoas');
const cancelEdit = document.getElementById('cancelEdit');
let editId = null;

async function fetchPessoas() {
    const res = await fetch('pessoas.php');
    const data = await res.json();
    lista.innerHTML = '';
    data.forEach(p => {
        const li = document.createElement('li');

        const infoSpan = document.createElement('span');
        infoSpan.textContent = `${p.nome} | ${p.cpf} | ${p.idade} anos`;
        infoSpan.className = 'item-text';

        const btnContainer = document.createElement('div');
        btnContainer.className = 'buttons';

        const editBtn = document.createElement('button');
        editBtn.textContent = 'Editar';
        editBtn.onclick = () => startEdit(p);

        const delBtn = document.createElement('button');
        delBtn.textContent = 'Excluir';
        delBtn.onclick = () => deletePessoa(p.id);

        btnContainer.appendChild(editBtn);
        btnContainer.appendChild(delBtn);

        li.appendChild(infoSpan);
        li.appendChild(btnContainer);

        lista.appendChild(li);
    });
}

function startEdit(p) {
    editId = p.id;
    document.getElementById('nome').value = p.nome;
    document.getElementById('cpf').value = p.cpf;
    document.getElementById('idade').value = p.idade;
    cancelEdit.style.display = 'inline';
}

cancelEdit.onclick = () => {
    editId = null;
    form.reset();
    cancelEdit.style.display = 'none';
};

form.onsubmit = async (e) => {
    e.preventDefault();
    const pessoa = {
        id: editId,
        nome: document.getElementById('nome').value,
        cpf: document.getElementById('cpf').value,
        idade: parseInt(document.getElementById('idade').value)
    };

    await fetch('pessoas.php', {
        method: editId ? 'PUT' : 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(pessoa)
    });

    editId = null;
    form.reset();
    cancelEdit.style.display = 'none';
    fetchPessoas();
};

async function deletePessoa(id) {
    if (!confirm('Deseja realmente excluir?')) return;
    await fetch('pessoas.php', {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id })
    });
    fetchPessoas();
}

fetchPessoas();
