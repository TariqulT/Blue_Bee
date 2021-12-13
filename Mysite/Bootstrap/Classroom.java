import java.util.*;

class Student {
	byte[] marks = new byte[6];
	short t_marks = 0;
	String stu_id;
	Student(byte[] arr, short sum, int id){
		t_marks = sum;
		for(int i = 0;i<6;i++){
			marks[i] = arr[i];
		}
		stu_id = "CSE 0"+id;
	}
}

public class Classroom {
	public static void main(String args[]){
		
		//Creating Object//

		Scanner input = new Scanner(System.in);
		System.out.print("Enter the Number of Student: ");
		int n = input.nextInt();
		Student[] stu = new Student[n];
		String[] subjects = {"Math", "Physics", "Chemistry", "EEE", "ME", "Programming"};

		//TAKING INPUT and INITILAIZING OBJECTS//

		for(int i = 0;i<n;i++){
			System.out.println("\nStudent ID: CSE 0"+(i+1));
			byte[] arr = new byte[6];
			short sum = 0;
			for(int j = 0;j<6;j++){
				System.out.print("Marks of "+subjects[j]+": ");
				arr[j] = input.nextByte();
				sum += arr[j];
			}
			stu[i] = new Student(arr,sum,i+1);
		}
		//SORT//
		sortStudent(stu);

		//Print Merit List//
		System.out.println("\n   Merit List \n");
		for(int i = 0;i<n;i++){
			System.out.println("Merit "+(i+1)+" :  "+stu[i].stu_id);
		}
	}

	//Sorting by using MergeSORT//

	public static void sortStudent(Student[] stu){
		Student[] aux = new Student[stu.length];
		mergeSort(stu,aux,0,stu.length-1);
	}

	public static void mergeSort(Student[] stu, Student[] aux, int lo, int hi){
		if(lo>=hi) return;
		int mid = (lo+hi)/2;
		mergeSort(stu,aux,lo,mid);
		mergeSort(stu,aux,mid+1,hi);
		merge(stu,aux,lo,mid,hi);
	}

	public static void merge(Student[] stu, Student[] aux, int lo, int mid, int hi){
		for(int k = lo;k<=hi;k++){
			aux[k] = stu[k];
		}
		int i = lo, j = mid+1;
		for(int k = lo;k<=hi;k++){
			if(i>mid) stu[k] = aux[j++];
			else if(j>hi) stu[k] = aux[i++];
			else if(isGreater(aux,i,j)) stu[k] = aux[i++];
			else stu[k] = aux[j++];
		}
	}
	public static boolean isGreater(Student[] aux, int i, int j){
		if(aux[i].t_marks>aux[j].t_marks) return true;
		else if(aux[i].t_marks<aux[j].t_marks) return false;
		else{
			for(int k = 0;k<6;k++){
				if(aux[i].marks[k]>aux[j].marks[k]) return true;
				else if(aux[i].marks[k]<aux[j].marks[k]) return false;
			}
		}
		return true;
	}
}