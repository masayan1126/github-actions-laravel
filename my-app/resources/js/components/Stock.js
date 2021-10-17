import React, { useState, useEffect } from 'react'
import ReactDOM from 'react-dom'

const Stock = () => {
    const element = document.getElementById('stock')
    var stockList = []

    if (element && element.dataset.stocks) {
        stockList = JSON.parse(element.dataset.stocks)
    }

    const [stocks, setStocks] = useState([])

    let csrf_token = document.head.querySelector(
        'meta[name="csrf-token"]'
    ).content

    console.log(csrf_token)

    useEffect(() => {
        setStocks(stockList)
    }, [])

    return (
        <div className="container">
            <h5>在庫一覧</h5>

            {stocks.map((stock) => (
                <div>
                    <div className="d-flex"></div>

                    <table className="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">商品画像</th>
                                <th scope="col">商品名</th>
                                <th scope="col">在庫数</th>
                                <th scope="col">賞味期限</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img
                                        src={stock.imageUrl}
                                        alt={`${stock.name} の画像`}
                                    />
                                </td>
                                <td>
                                    <a
                                        key={stock.id.toString()}
                                        href={stock.url}
                                    >
                                        {stock.name}
                                    </a>
                                </td>
                                <td>{stock.number}</td>
                                <td>{stock.expiryDate}</td>
                                <td>
                                    <form
                                        method="GET"
                                        action={`"/stocks/edit/"${stock.id}`}
                                    >
                                        <input
                                            type="hidden"
                                            name="id"
                                            value={stock.id}
                                        />
                                        <input type="submit" value="編集" />
                                    </form>
                                </td>
                                <td>
                                    <form
                                        method="POST"
                                        action={`"/stocks/delete/"${stock.id}`}
                                    >
                                        <input
                                            type="hidden"
                                            name="_token"
                                            value={csrf_token}
                                        />
                                        <input
                                            type="hidden"
                                            name="id"
                                            value={stock.id}
                                        />
                                        <input type="submit" value="削除" />
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            ))}
        </div>
    )
}

export default Stock

if (document.getElementById('stock')) {
    ReactDOM.render(<Stock />, document.getElementById('stock'))
}
