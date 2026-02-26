async function carregarSetores() {
    const res = await fetch('/api/setores');
    const setores = await res.json();

    const lista = document.getElementById('lista');
    lista.innerHTML = '';

    setores.forEach(s => {
        lista.innerHTML += `
            <li>
                ${s.nome}
                <button onclick="editar(${s.id}, '${s.nome}')">Editar</button>
                <button onclick="deletar(${s.id})">Excluir</button>
            </li>
        `;
    });
}

async function salvar() {
    const nome = document.getElementById('nome').value;

    const res = await fetch('/api/setores', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ nome })
    });

    const data = await res.json();

    if (!res.ok) {
        alert(data.message); // 👈 ALERTA AQUI
        return;
    }

    carregarSetores();
}

function editar(id, nome) {
    document.getElementById('id').value = id;
    document.getElementById('nome').value = nome;
}

async function deletar(id) {
    if (!confirm('Deseja excluir este setor?')) return;

    await fetch(`/api/setores/${id}`, {
        method: 'DELETE'
    });

    carregarSetores();
}

carregarSetores();
