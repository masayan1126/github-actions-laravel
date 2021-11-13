import React, { useCallback, useState, useEffect } from 'react'
import TDataRow from '../../Molecules/Theader/TDataRow'
import THeaderRow from '../../Molecules/Theader/TheaderRow'
import Image from '../../Atoms/Image/Image'
import BasicForm from '../../Molecules/Form/BasicForm'

const Table = (props) => {
    return (
        <table className="table">
            <thead>
                <THeaderRow headerList={props.headerList} />
            </thead>
            <tbody>
                {props.dataList.map((data) => (
                    <>
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
                                action={props.formInfo.action + data.id}
                                method={props.formInfo.method}
                                buttonName={props.buttonName}
                            ></BasicForm>
                        </td>
                        <td>
                            <BasicForm
                                action={props.formInfo.action}
                                method={props.formInfo.method}
                                buttonName={props.buttonName}
                            ></BasicForm>
                        </td>
                    </>
                ))}
                {/* <TDataRow dataList={props.dataList} /> */}
            </tbody>
        </table>
    )
}

export default Table
