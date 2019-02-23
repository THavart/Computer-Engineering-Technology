package sortPractice;

public class MergeSort {
	public static void main(String[] args) {
		int A[] = new int [10];
		populateA(A);
		System.out.println("Before sorting: ");
		printA(A);
		A = mergeSort(A);
		System.out.println("\nAfter sorting: ");
		printA(A);
	}
	public static int[] mergeSort(int[] B){
//If the length of the temporary array is 1, then just return the array (And exit the recursive loop(?))
		if (B.length <= 1){
			return B;
		}
//Defining a midpoint to split the arrays on.
		int midpoint = B.length/2;
//Defined the left side of the array, of length 0-midpoint
		int [] left  = new int [midpoint];
	//can't define the right the same way, as the length (odd or even) would change the result.
		int [] right;
//if & else statement to make sure if the array is of an even or odd length, if odd, then add one to the array declaration. if even, then declare as normal.
		if (B.length%2 == 0){
			right = new int [midpoint];
		}
		else{
			right = new int [midpoint+1];
		}
//creates an end result array, of the original array length.
		int[] result = new int [B.length];
//puts the values from the original array.
		for (int i=0; i < midpoint; i++){
			left[i] = B[i];
		}
//Storing values for the right side of the original array, those values that were not stored in the left.
		int x=0;
		for (int j=midpoint; j < B.length; j++){
			if ( x < right.length){
				right[x] = B[j];
				x++;
			}
		}
//recursive calls for the method to sort the separate parts of the array
		left = mergeSort(left);
		right = mergeSort(right);
//calls the merge method
		result = merge(left,right);
		return result;
	}
//purpose of this method to merge the existing halves into a full array.
	public static int[] merge (int[] left, int[] right){
//Final array created(result) with the length of the existing arrays.
		int lengthResult = left.length + right.length;
		int[] result = new int [lengthResult];
//used later to increment the array.
		int indexL = 0,indexR = 0,indexRes = 0;
//adding the values into the larger array
		while (indexL < left.length || indexR < right.length){
			if (indexL < left.length && indexR < right.length){
//making sure they are inputed while still sorted.
		//if the left side is greater/less than the right, input into result array.
				if (left[indexL] <= right[indexR]){
					result [indexRes] = left [indexL];
					indexL++;
					indexRes++;
				}
				else {
					result [indexRes] = right [indexR];
					indexR++;
					indexRes++;
				}
			}
			else if(indexL < left.length){
				result[indexRes] = left[indexL];
				indexL++;
				indexRes++;
			}
			else if(indexR < right.length){
				result[indexRes] = right[indexR];
				indexR++;
				indexRes++;
			}
		}
		return result;
	}
//Basically just prints the array
	public static void printA (int [] B){
		for (int i = 0; i < B.length; i++){
			System.out.print(B[i] + " ");
		}
	}
//Populates the default array with random values
	public static int[] populateA (int[] B){
		for (int i = 0; i < B.length; i++)
		{
			B[i] = (int) (Math.random()*100);
		}
		return B;
	}
}