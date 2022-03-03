const array = [
    // {
        'mauricio',
        '22',
    // },
    // {
    //     nome: 'mauricio',
    //     idade: '22',
    // },
    // {
    //     nome: 'mauricio',
    //     idade: '22',
    // },
    // {
    //     nome: 'mauricio',
    //     idade: '22',
    // },
    // {
    //     nome: 'mauricio',
    //     idade: '22',
    // },
    // {
    //     nome: 'mauricio',
    //     idade: '22',
    // },
    // {
    //     nome: 'mauricio',
    //     idade: '22',
    // },
]

const array2 = [
    5,
    2,
    6,
    7,
    10
]

// console.log(array.map((current, key) => `Nome: ${current.nome} Idade: ${current.idade}`)));

console.log(array.reduce((acc, curr) => acc = [...acc, { chave: curr }], []))