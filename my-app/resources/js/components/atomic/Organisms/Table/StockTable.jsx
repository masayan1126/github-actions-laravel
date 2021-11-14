import React, { useCallback, useState, useEffect } from 'react'
import THeaderRow from '../../Molecules/Theader/TheaderRow'
import Image from '../../Atoms/Image/Image'
import BasicForm from '../../Molecules/Form/BasicForm'

const StockTable = (props) => {
    return (
        <table className="table">
            <thead>
                <THeaderRow headerList={props.headerList} />
            </thead>
            <tbody>
                {props.dataList.map((data) => (
                    <tr>
                        <td>{data.id}</td>
                        <td>
                            <Image
                                src={data.imageUrl}
                                alt={`${data.name}の画像`}
                            />
                        </td>
                        <td>{data.name}</td>
                        <td>{data.number}</td>
                        <td>{data.expiryDate}</td>
                        <td>
                            <BasicForm
                                action={'/stocks/edit/' + data.id}
                                method={'GET'}
                                buttonName={'編集'}
                            />
                        </td>
                        <td>
                            <BasicForm
                                action={'/stocks/delete/' + data.id}
                                buttonName={'削除'}
                                method={'POST'}
                            ></BasicForm>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    )
}

export default StockTable
