import React, { useState } from 'react'
import ReactDOM from 'react-dom'

const Stock = () => {
    const element = document.getElementById('stock')
    if (element && element.dataset.hoge) {
        const object = JSON.parse(element.dataset.hoge)
        console.log(object)
    }

    // const props = Object.assign({}, element.dataset)
    // console.log(props)

    const [count, setCount] = useState(0)
    return <div className="container">在庫一覧</div>
}

export default Stock

if (document.getElementById('stock')) {
    ReactDOM.render(<Stock />, document.getElementById('stock'))
}
